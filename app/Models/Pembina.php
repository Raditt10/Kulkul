<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip','nuptk','nama','jk','tempat_lahir','tgl_lahir','telepon','email',
        'pendidikan','jurusan','alamat','ekskul','kategori','pengalaman','status','jumlah_siswa'
    ];

    protected $casts = [
        'ekskul' => 'array', // otomatis convert JSON ke array
    ];
}
