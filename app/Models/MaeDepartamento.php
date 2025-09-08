<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeDepartamento extends Model
{
    use HasFactory;
    protected $table = 'MAE_DEPARTAMENTO';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $primaryKey = 'COD_DEPARTAMENTO';
    protected $fillable= [
        'COD_DEPARTAMENTO',
        'DES_DEPARTAMENTO',
        'IND_BAJA',
    ];


}
