<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaContrato extends Model
{
    use HasFactory;
    protected $table = 'PLA_CONTRATO';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'COD_PERSONAL',
        'FEC_INGRESO',
        'FEC_INICIO',
        'FEC_FIN',
        'MONTO_SUELDO',
        'TIP_ESTADO',
        'FEC_INSERT',
        'USUARIO_INSERT',
        'TIP_CONTRATO'
    ]
    // personal 
    ;
}
