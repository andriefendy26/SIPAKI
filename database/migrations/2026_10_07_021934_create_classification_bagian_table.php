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
        Schema::create('bagian_classification', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_classification')
                ->constrained('classifications')
                ->cascadeOnDelete();

            $table->foreignId('bagian_id')
                ->constrained('bagians')
                ->cascadeOnDelete();
            
            $table->unique(['id_classification', 'bagian_id'], 'bagian_classification_unique');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bagian_classification');
    }
};
