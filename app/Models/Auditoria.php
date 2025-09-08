<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    use HasFactory;

 protected  $table = 'PLA_INTRANET_AUDITORIA';
    protected $primaryKey = 'COD_AUDITORIA';

    protected $fillable = [
        'COD_AUDITORIA',
        'COD_PERSONAL',
        'FECHA_INGRESO',
        'FECHA_CONSULTA',
        'COD_USUARIO',
        'FECHA_DESCARGA',
        'HOST',
        'COD_EMPRESA',
        
    ];
    

    public function usuario()
    {
        return $this->belongsTo(MaeUsuario::class, 'COD_USUARIO', 'COD_USUARIO');
    }

}
