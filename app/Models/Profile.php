<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';

    protected $fillable = [
        'user_id',
        'nik',
        'nama_lengkap',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'foto_profile',
        'foto_ktp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
