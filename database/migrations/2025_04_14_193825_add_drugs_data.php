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
        DB::table('drugs')->insert([
            ['minsan_code' => '25319034', "name" => "NEO-Optalion Compresse", "description" => "Farmaco di automedicazione", "expiration_date" => date('Y-m-d'), "price" => 0.0, "company_id" => 1, "active_ingredient_id" => 1, 'created_at' => date('Y-m-d H:i:s')]
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
