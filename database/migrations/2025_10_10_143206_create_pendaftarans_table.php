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
    schema::create('pendaftarans', function (Blueprint $table) {
            
            $table->id('id_pendaftaran'); 
            $table->foreignId('nis')->constrained('users', 'nis');
            $table->foreignId('ekskul_id')->constrained('ekskuls', 'id_ekskul'); 
            $table->text('alasan');
            $table->date('tgl_pendaftaran');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
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