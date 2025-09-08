<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Config;

class MaeUsuario extends TenantModel
{
    use HasFactory, Notifiable;

    protected $table = 'MAE_USUARIO';

    public $timestamps = false;

    /**
     * La clave primaria del modelo.
     *
     * @var string
     */
    protected $primaryKey = 'COD_USUARIO';

    /**
     * Indica si la clave primaria es auto-incrementable.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * El tipo de la clave primaria.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $fillable = [
        'COD_USUARIO',
        'COD_EMPRESA',

        'DES_PASSWORD',
        'IND_BAJA',
        'FECHA_BAJA',
        'NOM_USUARIO',
        'IND_ADMIN',
        'COD_PERSONAL',
        'IND_INTRANET'
    ];


    /**
     * Los atributos que deben ocultarse para las matrices.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'DES_PASSWORD',
        'remember_token',
    ];

    /**
     * Obtiene el nombre de la columna de contraseña para autenticación.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->DES_PASSWORD;
    }
    public function  isAdmin()
    {
        if ($this->IND_ADMIN) {
            return true;
        }
        return false;
    }

    public function getConnectionName()
    {
        return Config::get('database.default');
    }

    // Relación con Empresa (un usuario pertenece a una empresa)
    public function empresa()
    {
        return $this->belongsTo(MaeEmpresa::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }

    // Relación con Sucursales (un usuario puede pertenecer a muchas sucursales)
    public function sucursales()
    {
        return $this->belongsToMany(
            MaeSucursal::class,
            'MAE_SUCURSAL_USUARIO',
            'COD_USUARIO',
            'COD_SUCURSAL'
        )->withPivot('COD_EMPRESA');
    }
    public function sucursalesPermitidas(string $empresa): Collection
    {
        return $this->sucursales()
            ->wherePivot('COD_EMPRESA', $empresa)
            ->orderBy('MAE_SUCURSAL.NOM_SUCURSAL')
            ->get(['MAE_SUCURSAL.COD_SUCURSAL', 'MAE_SUCURSAL.NOM_SUCURSAL']);
    }
    public function personal()
    {
        return $this->hasOne(Personal::class, 'COD_PERSONAL', 'COD_PERSONAL');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'usuario', 'COD_USUARIO');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'usuario', 'COD_USUARIO');
    }
    /** ¿Tiene acceso a la intranet (según MAE + estado activo en users)? */
    public function tieneAccesoIntranet(): bool
    {
        // IND_INTRANET en MAE + active en users
        return (bool) ($this->active && optional($this->mae)->IND_INTRANET);
    }
    public function getCODUSUARIOAttribute($value)
    {
        return is_string($value) ? rtrim($value) : $value;
    }
}
