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
        Schema::table('drugs', function (Blueprint $table) {

            $table->unsignedBigInteger("company_id");
            $table->unsignedBigInteger("active_ingredient_id");
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('active_ingredient_id')->references('id')->on('active_ingredients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign('drugs_company_id_foreign');
        $table->dropForeign('drugs_active_ingredient_id_foreign');
        $table->dropColumn('company_id');
        $table->dropColumn('active_ingredient_id');
    }
};
