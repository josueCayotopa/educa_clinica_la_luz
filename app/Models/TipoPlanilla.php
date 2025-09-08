<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlanilla extends Model
{

    use HasFactory;
    protected $table = 'PLA_TIPO_PLANILLA';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


    protected $fillable =[
        'COD_EMPRESA',
        'COD_TIPO_PLANILLA',
        'DES_TIPO_PLANILLA',
    ];
}
