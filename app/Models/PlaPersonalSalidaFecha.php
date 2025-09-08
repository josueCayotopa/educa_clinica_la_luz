<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PlaPersonalSalidaFecha extends TenantModel
{
    use HasFactory;


    protected $table = 'PLA_PERSONAL_SALIDA_FECHA';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    // Estados del permiso
    const ESTADO_PENDIENTE = 'PENDIENTE';
    const ESTADO_APROBADO = 'APROBADO';
    const ESTADO_RECHAZADO = 'RECHAZADO';
    const ESTADO_EN_SALIDA = 'EN_SALIDA';
    const ESTADO_COMPLETADO = 'COMPLETADO';

    // +++ NUEVOS CAMPOS +++
    protected $fillable = [
        'COD_EMPRESA',      // <---
        'COD_SUCURSAL',     // <---
        'PERSONAL_ID',
        'FECHA_SALIDA',
        'FECHA_RETORNO',
        'FECHA_SALIDA_REAL',
        'FECHA_RETORNO_REAL',
        'MOTIVO_SALIDA',
        'USUARIO_APRUEBA',
        'CARGO_APRUEBA',
        'FECHA_APROBACION',
        'IND_AUTORIZA',
        'ESTADO_PERMISO',
        'OBSERVACION',
        'OBSERVACION_APROBACION',
        'USUARIO_SEGURIDAD_SALIDA',
        'USUARIO_SEGURIDAD_ENTRADA',
        'CREATED_AT',
        'UPDATED_AT',
        'USUARIO_CREA',
        'EMAIL_USUARIO_CREA',
        'USUARIO_MODIFICA',
    ];

    protected $casts = [
        'FECHA_SALIDA'       => 'datetime',
        'FECHA_RETORNO'      => 'datetime',
        'FECHA_SALIDA_REAL'  => 'datetime',
        'FECHA_RETORNO_REAL' => 'datetime',
        'FECHA_APROBACION'   => 'datetime',
        'CREATED_AT'         => 'datetime',
        'UPDATED_AT'         => 'datetime',
        // computados (solo lectura)
        'PERIODO' => 'integer',
        'MES'     => 'integer',
    ];


    // Relaciones
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'PERSONAL_ID', 'COD_PERSONAL');
    }

    public function usuarioCreador()
    {
        return $this->belongsTo(User::class, 'USUARIO_CREA');
    }

    public function usuarioAprobador()
    {
        return $this->belongsTo(User::class, 'USUARIO_APRUEBA');
    }

    public function usuarioSeguridadSalida()
    {
        return $this->belongsTo(User::class, 'USUARIO_SEGURIDAD_SALIDA');
    }

    public function usuarioSeguridadEntrada()
    {
        return $this->belongsTo(User::class, 'USUARIO_SEGURIDAD_ENTRADA');
    }

    // Accessors
    public function getEstadoColorAttribute()
    {
        return match ($this->ESTADO_PERMISO) {
            self::ESTADO_PENDIENTE => 'warning',
            self::ESTADO_APROBADO => 'success',
            self::ESTADO_RECHAZADO => 'danger',
            self::ESTADO_EN_SALIDA => 'info',
            self::ESTADO_COMPLETADO => 'success',
            default => 'secondary'
        };
    }

    public function getEstadoLabelAttribute()
    {
        return match ($this->ESTADO_PERMISO) {
            self::ESTADO_PENDIENTE => 'Pendiente Aprobación',
            self::ESTADO_APROBADO => 'Aprobado',
            self::ESTADO_RECHAZADO => 'Rechazado',
            self::ESTADO_EN_SALIDA => 'En Salida',
            self::ESTADO_COMPLETADO => 'Completado',
            default => $this->ESTADO_PERMISO
        };
    }

    // Métodos de estado
    public function puedeAprobar()
    {
        return $this->ESTADO_PERMISO === self::ESTADO_PENDIENTE;
    }

    public function puedeMarcarSalida()
    {
        return $this->ESTADO_PERMISO === self::ESTADO_APROBADO;
    }

    public function puedeMarcarEntrada()
    {
        return $this->ESTADO_PERMISO === self::ESTADO_EN_SALIDA;
    }

    public function puedeEditar()
    {
        return $this->ESTADO_PERMISO === self::ESTADO_PENDIENTE;
    }

    // Boot method
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($m) {
            if (auth()->check()) {
                $u = auth()->user();
                $m->USUARIO_CREA        = $u->id ?? $u->COD_USUARIO ?? null;
                $m->EMAIL_USUARIO_CREA  = $u->email ?? null;
                $m->CREATED_AT          = now();
                $m->ESTADO_PERMISO      = self::ESTADO_PENDIENTE;
                $m->IND_AUTORIZA        = 'N';
                // si no viene la empresa, tómala del personal
                if (empty($m->COD_EMPRESA) && $m->PERSONAL_ID) {
                    $m->COD_EMPRESA = DB::table('PLA_PERSONAL')
                        ->where('COD_PERSONAL', $m->PERSONAL_ID)
                        ->value('COD_EMPRESA');
                }
                // si no viene la sucursal, infiérela por el área del personal
                if (empty($m->COD_SUCURSAL) && $m->PERSONAL_ID && $m->COD_EMPRESA) {
                    $m->COD_SUCURSAL = DB::table('PLA_PERSONAL as per')
                        ->join('MAE_AREAS as a', function ($j) {
                            $j->on('a.COD_AREAS', '=', 'per.COD_AREAS')
                                ->on('a.COD_EMPRESA', '=', 'per.COD_EMPRESA');
                        })
                        ->where('per.COD_PERSONAL', $m->PERSONAL_ID)
                        ->where('per.COD_EMPRESA', $m->COD_EMPRESA)
                        ->value('a.COD_SUCURSAL');
                }
            }
        });

        static::updating(function ($m) {
            if (auth()->check()) {
                $m->USUARIO_MODIFICA = auth()->id();
                $m->UPDATED_AT       = now();
            }
        });
    }
}
