<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaConceptoSunat extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'PLA_CONCEPTO_SUNAT';
    protected $primaryKey = 'CODIGO';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'CODIGO',
        'DESCRIPCION'
    ];
}
