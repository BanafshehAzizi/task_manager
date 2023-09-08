<?php

namespace App\Services\Files;

use App\Repositories\Files\BrowsersRepository;
use App\Repositories\Files\FilesExtensionRepository;
use App\Repositories\Files\FilesRepository;
use App\Services\AbstractBaseService;
use App\Services\SettingService;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class FileService extends AbstractBaseService
{
    private $file_repository;
    private $file_extension_repository;
    private $browser_repository;

    private $setting_service;

    public function __construct(
        FilesRepository          $file_repository,
        FilesExtensionRepository $file_extension_repository,
        BrowsersRepository       $browser_repository,
        SettingService           $setting_service
    )
    {
        parent::__construct();
        $this->file_repository = $file_repository;
        $this->file_extension_repository = $file_extension_repository;
        $this->browser_repository = $browser_repository;
        $this->setting_service = $setting_service;
    }

    public function repository()
    {
        return FilesRepository::class;
    }

    public function insert($input)
    {
        $function = $this->uploadFile($input);
        $file_path = $function['location'];
        $size = $input['file']->getSize();

        $extension = strtolower($input['file']->getClientOriginalExtension());

        $function = $this->file_extension_repository->showRepository(['where' => [['name', $extension]]]);
        $extension_id = $function->id;

        if ($size > $function->max_size) {
            throw ValidationException::withMessages([__('validation.max.file', [
                'attribute' => __('validation.attributes.file'),
                'max' => $function->max_size
            ])]);//todo
        }

        $function = $this->browser_repository->showRepository(['where' => [['name', strtolower($input['browser_name'])]]]);
        if (empty($function)) {
            $function = $this->browser_repository->insertRepository([
                'name' => strtolower($input['browser_name'])
            ]);
        }
        $browser_id = $function->id;

        $function = $this->setting_service->showWithFailService(['where' => ['key' => 'file.access.max']]);

//        $file_path = "uploads/" . $input['file']['extension'] . "/" . date('Y/m/d') . "/" . $input['file']['name'] . "." . $input['file']['extension'];

        $function = $this->insertService([
            'extension_id' => $extension_id,
            'size' => $size,
            'name' => $file_path,
            'user_id' => $input['user_id'],
            'browser_id' => $browser_id,
            'ip_address' => $input['ip_address'],
            'type_id' => ($input['file_type'] == 'private') ? 1 : 2,
            'token' => bin2hex(random_bytes(16)),
            'token_expired_at' => Carbon::now()->addMinutes($function->value)
        ]);

        return $function;
    }

    public function uploadFile($input)
    {
        $this->validateFile($input);

        $milli_seconds = round(microtime(true) * 1000);
        $file_name = $milli_seconds . '_' . strtolower($input['file']->getClientOriginalName());

        $file_path = "public/storage/uploads/$input[file_type]/" . strtolower($input['file']->getClientOriginalExtension()) . "/";
        if ($input['file_type'] == 'private')
            $file_path = "public/storage/uploads/$input[file_type]/" . date('Y/m/d') . "/" . strtolower($input['file']->getClientOriginalExtension()) . "/";

        $file_full_path = $file_path . $file_name;

        $file_content = file_get_contents($input['file']->getRealPath());

        $file_uploader = Storage::disk('local')->put($file_full_path, $file_content);

        if (!$file_uploader) {
            return new ValidationException(['Error while uploading the file']);
        }

        $location = explode('/', $file_full_path);
        array_shift($location);
        $location = implode('/', $location);

        return ['file_name' => $file_name, 'location' => $location];
    }

    private function validateFile($input)
    {
        $file_name = $input['file']->getClientOriginalName();
        if ($file_name != trim($file_name) || strpos($file_name, ' ') !== false) {
            throw ValidationException::withMessages([__('messages.public.error.invalid', ['pattern' => __('validation.attributes.file_name')])]);
        }

        if (preg_match("/^[آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]/", $input['file']->getClientOriginalName())) {
            throw ValidationException::withMessages([__('messages.public.error.invalid', ['pattern' => __('validation.attributes.file_name')])]);
        }

        /*        $function = $this->file_extension_repository->showWithFailRepository(['where' => [['id', '!=', -1]]]);
                if (empty($function)) {
                    throw ValidationException::withMessages([__('messages.public.error.not_exist', ['pattern' => __('validation.attributes.extension')])]);
                }

                $file_formats = $function->pluck('mime_type');*/
        $function = $this->file_extension_repository->showRepository(['where' => [['name', $input['file']->getClientOriginalExtension()]]]);
        if (empty($function)) {
            throw ValidationException::withMessages([__('messages.public.error.invalid', ['pattern' => __('validation.attributes.mime_type')])]);
        }
    }

    public function delete($input)
    {
        try {
            $file = $this->file_repository->showWithFailRepository([
                'where' => [['token', $input['token']]]//, ['user_id', $input['user_id']]
            ]);
        }catch (Exception $exception) {
            //todo
        }

        Storage::delete($file->name);

        $this->file_repository->deleteRepository([
            'where' => [['token', $input['token']]]//, ['user_id', $input['user_id']]
        ]);
    }
}
