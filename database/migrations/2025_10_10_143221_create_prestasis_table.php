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
        Schema::create('prestasis', function (Blueprint $table) {
            
            
            // Mengganti $table->id('id_prestasi') dengan bigIncrements() untuk PK kustom.
            $table->id('id_prestasi'); 
            
            $table->string('nama_prestasi', 100); 
            $table->date('tgl_prestasi');
            
            // ASUMSI A: Jika 'tingkat' adalah FK ke tabel 'tingkats' (misalnya), gunakan:
            // $table->foreignId('tingkat_id')->constrained('tingkats'); 
            // ASUMSI B: Jika 'tingkat' adalah string (misalnya 'Kota', 'Provinsi'), gunakan:
            $table->string('tingkat', 30); 
            
            
            // Gunakan string() untuk menyimpan path atau nama file sertifikat.
            $table->string('sertifikat', 255)->nullable(); 
            
            // Kolom timestamps sangat disarankan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};