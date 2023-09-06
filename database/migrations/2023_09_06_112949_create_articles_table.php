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
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('summary');
            $table->uuid('author_id');
            $table->uuid('status_id');
            $table->uuid('priority_id');
            $table->dateTime('published_at');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('articles_status')
                ->onUpdate('cascade');

            $table->foreign('priority_id')
                ->references('id')
                ->on('articles_priority')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
