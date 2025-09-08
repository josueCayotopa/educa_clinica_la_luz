<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class MaeSucursal extends Model
{
    protected $table = 'MAE_SUCURSAL';
    protected $primaryKey = 'COD_SUCURSAL';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'COD_EMPRESA',
        'COD_SUCURSAL',
        'NOM_SUCURSAL',
        'NUM_TELEFONO',
        'NUM_FAX',
        'NUM_EMAIL',
        'FEC_INI_OPERACION',
        'DES_DIRECCION',
        'IND_BAJA',
    ];
    public function empresa()
    {
        return $this->belongsTo(MaeEmpresa::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }

    // Relación con Usuarios (una sucursal tiene muchos usuarios)
    public function usuarios()
    {
        return $this->belongsToMany(
            MaeUsuario::class,
            'MAE_SUCURSAL_USUARIO',
            'COD_SUCURSAL',
            'COD_USUARIO'
        )->withPivot('COD_EMPRESA');
    }
}
