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
            $table->id('id_ekskul'); // id_ekskul dari JSON
            $table->string('nama_ekskul');
            $table->enum('kategori', ['seni', 'tekhnologi', 'akademi', 'olahraga']);
            $table->string('pembina'); // nama pembina
            $table->string('hari'); // hari ekstrakurikuler
            $table->time('jam_mulai'); // jam mulai
            $table->time('jam_selesai'); // jam selesai
            $table->integer('anggota')->default(0); // jumlah anggota
            $table->text('deskripsi')->nullable(); // deskripsi ekskul
            $table->timestamps(); // created_at & updated_at
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