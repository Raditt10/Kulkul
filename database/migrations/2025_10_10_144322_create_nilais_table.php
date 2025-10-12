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
        Schema::create('nilais', function (Blueprint $table) {
            
            // Menggunakan bigIncrements() untuk PK Auto-Increment dengan nama kustom.
            $table->id('id_nilai'); 
            
            // Nilai (misalnya angka 1-100 atau A/B/C) lebih baik menggunakan integer, float, atau string.
            // ASUMSI: Jika nilai berupa angka (misalnya 1-100).
            $table->string('nilai', 5); 
            
            // Jumlah selalu berupa angka (Integer).
            $table->unsignedTinyInteger('jml_ekskul'); 
            
            // 'id_ekskul' menjadi 'ekskul_id' agar sesuai konvensi Laravel.
            $table->foreignId('id_ekskul')
                  ->constrained('ekskuls', 'id_ekskul') // Mereferensi 'id_ekskul' di tabel 'ekskuls'
                  ->onDelete('cascade'); // Opsional: hapus nilai jika ekskul dihapus
            
            // LOGIKA: Biasanya nilai harus terkait juga dengan 'user' atau 'siswa'.
            // Tambahkan kolom user_id sebagai FK (Diasumsikan merujuk ke tabel 'users').
            $table->foreignId('nis')->constrained('users', 'nis'); // Mereferensi 'id' di tabel 'users'
            
            // Kolom created_at dan updated_at
            $table->timestamps();

            // Opsional: Membuat kombinasi user_id dan ekskul_id unik (satu user hanya bisa punya satu nilai per ekskul)
            $table->unique(['nis', 'id_ekskul']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};