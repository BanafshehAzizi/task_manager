<?php

namespace App\Services;

use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SettingService extends AbstractBaseService
{
    private $setting_repository;

    public function __construct(SettingsRepository $setting_distribution_repository)
    {
        parent::__construct();
        $this->setting_repository = $setting_distribution_repository;
    }

    public function repository()
    {
        return SettingsRepository::class;
    }

    public function list(Request $request)
    {
        return $this->setting_repository->list($request);
    }

    public function update($input)
    {
        $setting_id = $input['setting_id'];
        unset($input['setting_id']);
        $this->setting_repository->updateRepository([
            'where' => [['id', $setting_id]],
            'input' => $input,
        ]);
    }

    public function showValue($input)
    {
        $setting = $this->setting_repository->showWithFailRepository([
            'where' => [['key', $input['key']]]
        ]);
        $value = $setting['value'];

        $client = $setting->clients()
            ->wherePivot('client_id', $input['client_id'])
            ->first();

        if (!empty($client)) {
            $value = $client->pivot->value;
        }

        return $value;
/*        if ($value != "-1" && $input['current_count'] >= $value) {
            throw ValidationException::withMessages([__('messages.public.error.invalid_insert', ['pattern' => __('validation.custom.more_than', ['value' => $setting['value'], 'attribute' => __('validation.attributes.'.$input['validation_attribute'])])])]);
        }*/
    }
}
