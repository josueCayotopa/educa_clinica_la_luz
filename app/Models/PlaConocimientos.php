<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaConocimientos extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'PLA_CONOCIMIENTOS';
    protected $primaryKey = 'COD_CONOCIMIENTO';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'COD_EMPRESA',
        'COD_CONOCIMIENTO',
        'NOM_CONOCIMIENTO',
        'TIP_NIVEL_PRIORIDAD',
        'IND_BAJA',
        'FEC_BAJA',
    ];

}
