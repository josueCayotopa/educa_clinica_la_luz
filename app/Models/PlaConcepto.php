<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaConcepto extends Model
{
    use HasFactory;

    protected $table = 'PLA_CONCEPTO';
    protected $primaryKey = ['COD_EMPRESA', 'COD_CONCEPTO'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'COD_EMPRESA',
        'COD_CONCEPTO',
        'DES_NOMBRE',
        'DES_NOMBRE_CORTO',
        'NUM_VER_PLAN_CUENTAS',
        'COD_CUENTA_CARGO',
        'TIP_OPERACION',
        'IND_FORMULA',
        'COD_CUENTA_ABONO',
        'COD_FORMULA',
        'NUM_GRUPO',
        'TIP_RENTA_QTACAT',
        'TIP_APLICACION',
        'IND_GRATIFICA',
        'COD_MONEDA_DEFAULT',
        'IND_RECIBE_CONCEPTO',
        'TIP_CTS',
        'TIP_INGRESO',
        'TIP_AUTO_MAN',
        'IND_TOTAL',
        'COD_CONCEPTO_ORIGEN',
        'COD_USER_ACTUAL',
        'FEC_ACTUALIZA',
        'IND_GRATI_SEM',
        'CTA_CARGO_SALARIO',
        'CTA_ABONO_SALARIO',
        'COD_SUNAT',
        'DES_NOMBRE_SUNAT',
        'IND_PAGADO',
    ];


    public function empresa()
    {
        return $this->belongsTo(MaeEmpresa::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }


    public function scopeActivos($query)
    {
        return $query->where('IND_TOTAL', '1');
    }

    public function scopePorEmpresa($query, $codEmpresa)
    {
        return $query->where('COD_EMPRESA', $codEmpresa);
    }

    public function getTipoOperacionTextoAttribute()
    {
        $tipos = [
            'I' => 'Ingreso',
            'D' => 'Descuento',
            'A' => 'Aporte',
            'C' => 'Contribución'
        ];

        return $tipos[$this->TIP_OPERACION] ?? 'No definido';
    }

    public function getRouteKey()
    {
        return $this->COD_EMPRESA . '-' . $this->COD_CONCEPTO;
    }
}
