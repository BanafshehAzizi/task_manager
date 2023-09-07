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
        Schema::create('files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('browser_id')->nullable();
            $table->unsignedBigInteger('extension_id');
            $table->string('ip_address',32)->nullable();
            $table->string('name');
            $table->integer('size');
            $table->string('token');
            $table->dateTime('token_expired_at')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->foreign('browser_id')
                ->references('id')
                ->on('browsers')
                ->onUpdate('cascade');

            $table->foreign('extension_id')
                ->references('id')
                ->on('files_extension')
                ->onUpdate('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('files_type')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
