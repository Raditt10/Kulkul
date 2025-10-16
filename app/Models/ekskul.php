<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekskul extends Model
{
    protected $table = 'ekskuls'; // Nama table sesuai DB Anda
    protected $primaryKey = 'id_ekskul'; // Primary key sesuai kolom DB
    public $incrementing = true; // Jika primary key auto increment
    protected $keyType = 'int'; // Tipe data primary key
    public $timestamps = false; // Jika tidak memakai kolom created_at/updated_at
    /** @use HasFactory<\Database\Factories\EkskulFactory> */
    protected $fillable = [
    'nama_ekskul',
    'kategori',
    'pembina',
    'hari',
    'jam_mulai',
    'jam_selesai',
    'anggota',
    'deskripsi'
];
}
