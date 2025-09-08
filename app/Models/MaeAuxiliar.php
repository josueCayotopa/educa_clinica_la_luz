<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeAuxiliar extends Model
{
    use HasFactory;
    protected $primaryKey = 'COD_AUXILIAR';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $table = 'MAE_AUXILIAR';
    protected  $fillable =[
     'COD_EMPRESA',
     'COD_AUXILIAR',
     'DES_AUXILIAR',
     'TIP_DOC_IDENTIDAD',
     'NUM_DOC_IDENTIDAD',
     'NUM_RUC',
     'NUM_TELEFONO',
     'DES_DIRECCION',
     'COD_PAIS',
     'TIP_PERSONERIA',
     'FECHA_ACTUALIZA',
     'COD_UBIGEO'
    ];
    public function personal()
    {
        return $this->hasOne(Personal::class, 'COD_AUXILIAR', 'COD_AUXILIAR');
    }
    public function auxiliar()
    {
        return $this->hasOne(MaeAuxiliar::class, 'COD_AUXILIAR', 'COD_AUXILIAR');
    }

}
