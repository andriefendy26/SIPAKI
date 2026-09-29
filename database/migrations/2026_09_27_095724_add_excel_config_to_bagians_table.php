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
        Schema::table('bagians', function (Blueprint $table) {
            $table->string('excel_template')->nullable()->after('name'); 
            // path relatif ke storage/app/public/templates/xxx.xlsx
            $table->json('excel_config')->nullable()->after('excel_template');
            // berisi mapping sheet & cell yang berbeda tiap bagian
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bagians', function (Blueprint $table) {
            //
            $table->dropColumn([
                'excel_template',
                'excel_config',
            ]);
        });
    }
};
