<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('files_extension', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('mime_type');
            $table->integer('max_size');
            $table->string('icon_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_extension');
    }
};
