<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = 'users';     // Nama tabel
    protected $primaryKey = 'nis';  // ✅ Gunakan kolom NIS sebagai primary key
    public $incrementing = false;   // ✅ Karena NIS bukan auto increment
    protected $keyType = 'string';  // ✅ Jika NIS bertipe teks (jika integer, boleh dihapus)
    public $timestamps = false;     // ✅ Jika tidak ada kolom created_at & updated_at

    // protected $fillable = [
    //     'nis',
    //     'name',
    //     'email',
    //     'password',
    //     'no_tlp',
    //     'alamat_rumah',
    //     'tgl_lahir',
    //     'pangkat'
    // ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime'
        ];
    }
}
