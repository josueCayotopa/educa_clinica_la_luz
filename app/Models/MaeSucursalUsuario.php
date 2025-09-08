<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeSucursalUsuario extends Model
{
    use HasFactory;
    protected $table = 'MAE_SUCURSAL_USUARIO';

    public $timestamps = false;
    protected $fillable = [
        'COD_USUARIO',
        'COD_EMPRESA',
        'COD_SUCURSAL',
    ];
}
