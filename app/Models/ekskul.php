<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskuls'; // Nama tabel
    protected $primaryKey = 'id_ekskul';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // Ganti ke true jika tabel pakai created_at & updated_at

    protected $fillable = [
        'nama_ekskul',
        'kategori',
        'pembina',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'anggota',
        'deskripsi',
    ];

    public function getJamMulaiFormattedAttribute()
{
    return date('H:i', strtotime($this->jam_mulai));
}

    public function getJamSelesaiFormattedAttribute()
    {
        return date('H:i', strtotime($this->jam_selesai));
    }
}


