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
        Schema::create('members', function (Blueprint $table) {
            
            // Menggunakan bigIncrement.
            $table->bigIncrements('id_member'); 
            
            // Asumsi: mereferensi Primary Key di tabel 'users'.
            $table->foreignId('user_id') 
                  ->constrained('users', 'kode_user') // Mereferensi kolom 'kode_user' di tabel 'users'
                  ->onDelete('cascade'); // Opsional: Hapus member jika user dihapus
            
            // Kolom menggunakan ENUM atau BOOLEAN untuk data kategorikal.
            $table->enum('kehadiran', ['Hadir', 'Izin', 'Alpha', 'Sakit'])->default('Alpha');
            
            // Kolom created_at dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};