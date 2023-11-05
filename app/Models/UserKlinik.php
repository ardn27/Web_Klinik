<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserKlinik extends model
{
    use HasFactory;
    protected $table = 'user_kliniks';
    protected $primaryKey= "id";
    protected $dates = ['tgl_lahir', 'jadwal_kunjungan'];
    protected $fillable = [ 'id_spesialis' ,'nama_lengkap', 'jns_kelamin', 'tgl_lahir', 'nik', 'no_telp', 'alamat'];
    public $timestamps=false;

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_spesialis', 'id');
    }
}
