<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaTipoPlanilla extends Model
{
    
    use HasFactory;
    protected $table = 'PLA_TIPO_PLANILLA';
    protected $primaryKey = 'COD_TIPO_PLANILLA';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'COD_EMPRESA',
        'COD_TIPO_PLANILLA',
        'DES_TIPO_PLANILLA',
        'TIP_PROC_SEMA',
        'TIP_PROCESO',
        'NUM_VER_PLAN_CUENTAS',
        'COD_CUENTA_CARGO',
        'IND_REDONDEO',
        'TIP_REDONDEO',
        'IND_DER_PLANILLA',
        'IMP_TOPE_PRESTAMO',
        'NUM_PORC_ADELA_QUINCE',
        'TIP_APLICA_PRESTAMO'
         
    ]
    ;
    // EMPRESAS
    public function empresa()
    {
        return $this->belongsTo(MaeEmpresa::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }
}
