<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmPaciente extends Model
{
    use HasFactory;
    protected $primaryKey = 'COD_PACIENTE';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = 'ADM_PACIENTE';
    protected  $fillable = [
        'COD_AUXILIAR',
        'COD_EMPRESA',
        'NOM_PACIENTE',
        'APE_PATERNO',
        'APE_MATERNO',
        'FEC_NACIMIENTO',
        'NUM_HC',
        'DES_GENERO',

    ];
}
