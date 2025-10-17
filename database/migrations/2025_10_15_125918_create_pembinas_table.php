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
        Schema::create('pembinas', function (Blueprint $table) {
            $table->id('nip');
            $table->string('nuptk');
            $table->string('nama');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('no_telp');
            $table->string('email');
            $table->string('lahir');
            $table->enum('pendidikan', ['S1', 'S2', 'S3']);
            $table->enum('jurusan', ['PPLG', 'TKJ', 'KA']);
            $table->string('alamat');
            $table->string('ekslul');
            $table->foreignId('ekskul_id')->constrained('ekskuls', 'id_ekskul'); 
            $table->integer('pengalaman');
            $table->enum('status' ,['aktif', 'cuti', 'pensiun', 'nonaktif']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembinas');
    }
};
