<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('companies')->insert([
            ['name' => 'Fidia', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Sella', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Zambon', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Angelini', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Bayer', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'FL Medical', 'created_at' => date('Y-m-d H:i:s')],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('companies')->truncate();
    }
};
