<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaComprobanteContable extends Model
{
    use HasFactory;
    protected $table = 'PLA_COMPROB_CONTABLE';
    protected $primaryKey = 'TIP_OPERACION_CONTA';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = 
    [
        'COD_EMPRESA',
        'TIP_OPERACION_CONTA',
        'NUM_CORR_OPER',
        'COD_AUXILIAR_BANCO',
        'COD_TIPO_PLANILLA',
        'COD_MONEDA',
        'TIP_DEBE_HABER',
        'NUM_VER_PLAN_CUENTAS',
        'COD_CUENTA',
        'IND_CTA_GRATI_CIERRE',

    ];
}
