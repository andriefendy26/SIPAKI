<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('classification_bagian') && !Schema::hasTable('bagian_classification')) {
            Schema::rename('classification_bagian', 'bagian_classification');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('bagian_classification') && !Schema::hasTable('classification_bagian')) {
            Schema::rename('bagian_classification', 'classification_bagian');
        }
    }
};
