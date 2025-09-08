<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeUbigeo extends Model
{
    protected $table = 'MAE_UBIGEO';
    protected $primaryKey = 'COD_UBIGEO';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'COD_UBIGEO',
        'DES_UBIGEO',
        'COD_UBIGEOP',
        'DES_UBIGEO_CAPITAL',
        'COD_ZONA1',
        'COD_ZONA2',
        'COD_ZONA3',
    ];

    public function padre()
    {
        return $this->belongsTo(MaeUbigeo::class, 'COD_UBIGEOP', 'COD_UBIGEO');
    }

    public function hijos()
    {
        return $this->hasMany(MaeUbigeo::class, 'COD_UBIGEOP', 'COD_UBIGEO');
    }
}
