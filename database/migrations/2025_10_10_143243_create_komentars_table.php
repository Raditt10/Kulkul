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
        Schema::create('komentars', function (Blueprint $table) {
            
            // bigIncrements() untuk PK kustom.
            $table->id('id_komentar'); 
            
            $table->text('isi_komentar'); 
            // Kolom created_at (untuk tgl_komentar) dan updated_at.
            // Asumsi: kode_user adalah Primary Key di tabel 'users'.
            $table->foreignId('nis')
                  ->constrained('users', 'nis') // Asumsi FK di tabel 'users' bernama 'kode_user'
                  ->onDelete('cascade'); // Opsional: hapus komentar jika user dihapus
            
            // Kolom timestamps yang mencakup created_at (seperti tgl_komentar)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};