<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('iuran', function (Blueprint $table) {
            $table->id('ID_Iuran'); // Primary Key (ID_Iuran)

            // Foreign Key NIK
            $table->string('NIK', 16);
            $table->foreign('NIK')->references('NIK')->on('warga')->onDelete('cascade');

            $table->date('Periode');
            $table->unsignedBigInteger('Nominal');
            $table->date('Tanggal_Bayar')->nullable();
            $table->enum('Status_Bayar', ['Lunas', 'Belum Bayar', 'Terlambat'])->default('Belum Bayar');
            $table->string('Keterangan')->nullable();
            $table->timestamps();

            // Mencegah duplikasi iuran untuk NIK yang sama pada periode yang sama
            $table->unique(['NIK', 'Periode']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('iuran');
    }
};
