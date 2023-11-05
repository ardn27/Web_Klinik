<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisAnak extends Model
{
    use HasFactory;
    protected $table ='spesialis_anaks';
    protected $primaryKey='id';
    protected $fillable = [ 'id_pasien', 'id_resep_1', 'id_resep_2', 'id_resep_3', 'keluhan', 'resep'];

    public function userklinik()
    {
        return $this->belongsTo(UserKlinik::class,'id_pasien', 'id' );
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'nama_obat');
    }

    public function resep_1()
    {
        return $this->belongsTo(Resep::class, 'id_resep_1', 'id');
    }

    public function resep_2()
        {
            return $this->belongsTo(Resep::class, 'id_resep_2', 'id');
        }

    public function resep_3()
    {
        return $this->belongsTo(Resep::class, 'id_resep_3', 'id');
    }
}
