<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans';
    
    protected $fillable = [
        'nis',
        'ekskul_id', 
        'alasan',
        'tgl_pendaftaran'
    ];

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'ekskul_id', 'id_ekskul');
    }
}