<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeAreas extends Model
{

    protected $table = 'MAE_AREAS';
    protected $primaryKey = 'COD_AREAS'; // <- CORREGIDO
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'COD_EMPRESA',
        'COD_AREAS',
        'DES_AREAS',
        'IND_BAJA',
    ];
}
