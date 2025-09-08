<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaFormulaDet extends Model
{
    use HasFactory;

    protected $table = 'PLA_FORMULA_DET';
    protected $primaryKey = 'COD_SECUENCIA';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'COD_FORMULA',
        'COD_GRUPO',
        'TIP_DATO',
        'VAL_DATO',
        'TIP_OPERACION'

    ];
}
