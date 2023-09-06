<?php

namespace Database\Seeders\Files;

use App\Models\Files\FilesExtension;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FilesExtensionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            [
                'id' => 1,
                'name' => 'jpg',
                'mime_type' => 'image/jpeg',
                'max_size' => '5120',
                'icon_path' => Storage::url("uploads/public/formats/jpg.png")
            ],
            [
                'id' => 2,
                'name' => 'jpeg',
                'mime_type' => 'image/jpeg',
                'max_size' => '5120',
                'icon_path' => Storage::url("uploads/public/formats/jpeg.png")
            ],
            [
                'id' => 3,
                'name' => 'png',
                'mime_type' => 'image/png',
                'max_size' => '5120',
                'icon_path' => Storage::url("uploads/public/formats/png.png")
            ],
            [
                'id' => 4,
                'name' => 'svg',
                'mime_type' => 'image/svg+xml',
                'max_size' => '5120',
                'icon_path' => Storage::url("uploads/public/formats/svg.png")
            ],
            [
                'id' => 5,
                'name' => 'pdf',
                'mime_type' => 'application/pdf',
                'max_size' => '5120',
                'icon_path' => Storage::url("uploads/public/formats/pdf.png")
            ],
            [
                'id' => 6,
                'name' => 'zip',
                'mime_type' => 'application/zip',
                'max_size' => '5120',
                'icon_path' => Storage::url("uploads/public/formats/zip.jpg")
            ],
        ];
        FilesExtension::insert($input);
    }
}
