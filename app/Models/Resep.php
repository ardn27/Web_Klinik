<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $table = 'reseps';
    protected $fillable = ['id_obat', 'resep'];
    protected $primaryKey = 'id';

    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_resep_1', 'id_resep_2', 'id_resep_3');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}
