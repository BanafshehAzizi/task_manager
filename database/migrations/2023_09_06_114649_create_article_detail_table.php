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
        Schema::create('article_detail', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('article_id');
            $table->text('content');
            $table->timestamps();

            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_detail');
    }
};
