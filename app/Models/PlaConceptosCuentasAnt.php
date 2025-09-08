<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaConceptosCuentasAnt extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'PLA_CONCEPTO_CUENTAS_ANT';
    protected $primaryKey = 'COD_PERSONAL';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'CONCEPTO',
        'DESCRIPCION',
        'COD_CUENTA',
        'COD_CUENTA_CON',

    ];

}
