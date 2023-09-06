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
        Schema::create('articles_pivot_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('article_id');
            $table->uuid('file_id');
            $table->timestamps();

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
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
        Schema::dropIfExists('articles_pivot_files');
    }
};
