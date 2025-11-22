<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            // NIK sebagai Primary Key
            $table->string('NIK', 16)->primary();
            $table->string('Nama', 100);
            $table->date('Tanggal_Lahir')->nullable();
            $table->string('Alamat');
            $table->string('RT', 5);
            $table->string('Status_Tinggal')->default('Tinggal Permanen');
            $table->string('Nomor_HP', 15)->nullable();
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
