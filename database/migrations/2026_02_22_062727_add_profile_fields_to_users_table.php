<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('photo_profile')->nullable()->after('email');
            $table->string('nik')->nullable()->after('photo_profile');
            $table->string('jabatan')->nullable()->after('nik');
            $table->string('bagian')->nullable()->after('jabatan');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'photo_profile',
                'nik',
                'jabatan',
                'bagian'
            ]);

        });
    }
};