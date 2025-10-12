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
        Schema::create('pendaftarans', function (Blueprint $table) {
            
            // Gunakan bigIncrements() untuk Primary Key Auto-Increment bernama kustom.
            $table->id('id_pendaftaran'); 
            
            // Gunakan foreignId() dan constrained() untuk FK yang mereferensi tabel 'users'
            // asumsi kode_user adalah Primary Key di tabel 'users'.
            // $table->foreignId('user_id')->constrained('users', 'kode_user'); // Jika FK di tabel 'users' bernama 'kode_user'
            // ATAU jika 'kode_user' adalah Primary Key non-id di 'users', gunakan:
            $table->string('kode_user')->references('kode_user')->on('users');

            
            // Gunakan foreignId() dan constrained() untuk FK yang mereferensi tabel 'ekskuls'
            $table->foreignId('ekskul_id')->constrained('ekskuls', 'id_ekskul'); // Mereferensi 'id_ekskul' di tabel 'ekskuls'
            
            // Kolom Alasan
            $table->text('alasan');
            
            // Kolom Tanggal Pendaftaran
            $table->date('tgl_pendaftaran');
            
            // Tentukan nama kolom dan daftar nilainya dalam bentuk array
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');

            // Kolom created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};