<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('NIK', 16);   
            $table->string('Nama_Lengkap', 100);
            $table->enum('Jenis_Surat', ['Surat Domisili', 'Surat Usaha', 'Surat Pengantar']);
            $table->text('Keterangan')->nullable();
            $table->date('Tanggal_Pengajuan')->default(now());
            $table->timestamps();

            // foreign key ke tabel warga
            $table->foreign('NIK')
                  ->references('NIK')
                  ->on('warga')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
