<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $primaryKey = 'id';
    protected $fillie;
    public $timestamps= false;

    public function userklinik()
    {
        return $this->hasMany(UserKlinik::all);
    }

}

