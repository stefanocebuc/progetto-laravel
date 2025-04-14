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
        DB::table('active_ingredients')->insert([
            ['atc_code' => 'N02BE01', "main_ingredient" => "Paracetamolo", "description" => "Il paracetamolo...", 'created_at' => date('Y-m-d H:i:s')],
            ['atc_code' => '000R05X', "main_ingredient" => "Olio di eucalipto", "description" => "Olio esenziale di eucalipto e bla bla...", 'created_at' => date('Y-m-d H:i:s')],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('active_ingredients')->truncate();
    }
};
