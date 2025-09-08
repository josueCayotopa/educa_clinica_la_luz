<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaVacacionesMesCab extends Model
{
    use HasFactory;
    
    protected $table = 'PLA_VACACIONES_MES_CAB';
    protected $primaryKey = 'COD_CORR_VAC';
    public $incrementing = false;
    public $timestamps = false; 
    
    protected $fillable = [
        'COD_PERSONAL',
        'COD_EMPRESA',
        'ANO_PROCESO',
        'COD_PERIODO',
        'MES_PROCESO',
        'COD_CORR_VAC',
        'COD_MONEDA',
        'COD_PRESTAMO_DEST',
        'FEC_ADELA',
        'FEC_INICIO',
        'FEC_FINAL',
        'NUM_TOT_DIAS',
        'IND_TRANSF_PLAN',
        'IMP_TOT_VACACION',
        'IND_TRANSF_MOVI',
        'COD_USER_ACTUAL',
        'FEC_ACTUALIZA',
        'FEC_TRANS_MOVI',
        'IND_CALCULAR'
    ];

    // Relación con Personal
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'COD_PERSONAL', 'COD_PERSONAL');
    }

    // Relación con Cargo a través de Personal
    public function cargo()
    {
        return $this->hasOneThrough(
            PlaCargos::class,
            Personal::class,
            'COD_PERSONAL', // Foreign key en Personal
            'COD_CARGO',    // Foreign key en PlaCargos
            'COD_PERSONAL', // Local key en PlaVacacionesMesCab
            'COD_CARGO'     // Local key en Personal
        );
    }
}
