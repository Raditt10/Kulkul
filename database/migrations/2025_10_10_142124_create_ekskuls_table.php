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
        Schema::create('ekskuls', function (Blueprint $table) {
            // Menggunakan bigIncrements() untuk Primary Key Auto-Increment dengan nama kustom.
            $table->bigIncrements('id_ekskul'); 
            
            // Tambahkan unique() jika nama ekskul tidak boleh duplikat
            $table->string('nama_ekskul', 50)->unique(); 
            
            // Hari ekskul
            $table->string('hari', 8); 
            
            // Menggunakan time() untuk menyimpan waktu murni
            $table->time('jam_mulai');    
            $table->time('jam_selesai');  
            
            $table->string('pelatih', 40);
            $table->text('deskripsi'); 
            
            // Kolom created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekskuls');
    }
};