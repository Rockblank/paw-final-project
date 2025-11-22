<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('iuran', function (Blueprint $table) {
            // Kolom untuk menyimpan path/nama file foto
            $table->string('Bukti_Iuran')->nullable()->after('Nominal');
        });
    }

    public function down(): void
    {
        Schema::table('iuran', function (Blueprint $table) {
            $table->dropColumn('Bukti_Iuran');
        });
    }
};
