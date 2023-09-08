<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER Table articles add refer_id INTEGER NOT NULL UNIQUE AUTO_INCREMENT;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
