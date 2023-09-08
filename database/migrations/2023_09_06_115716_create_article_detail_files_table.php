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
        Schema::create('article_detail_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('detail_id');
            $table->uuid('file_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('detail_id')
                ->references('id')
                ->on('article_detail')
                ->onUpdate('cascade');

            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_detail_files');
    }
};
