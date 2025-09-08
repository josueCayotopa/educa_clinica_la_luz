<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PlaPermisosPersonal extends Model
{
    use HasFactory;

    protected $table = 'PLA_PERMISOS_PERSONAL';
    protected $primaryKey = 'ID';
    public $incrementing = true;
    protected $keyType = 'int';

    // Usar los campos de timestamp personalizados
    const CREATED_AT = 'FECHA_CREACION';
    const UPDATED_AT = 'ULTIMA_ACTUALIZACION';

    // Estados del permiso
    const ESTADO_PENDIENTE = 'pendiente';
    const ESTADO_APROBADO_RH = 'aprobado_rh';
    const ESTADO_RECHAZADO_RH = 'rechazado_rh';
    const ESTADO_ACTIVO = 'activo'; // Cuando está en vigencia
    const ESTADO_COMPLETADO = 'completado';
    const ESTADO_CANCELADO = 'cancelado';



    protected $fillable = [
        'PERSONAL_ID', //  TIPO VAR CHAR
        'ID_MOTIVO', // Cambiar TIPO_PERMISO por ID_MOTIVO
        'FECHA_INICIO',
        'FECHA_FIN',
        'DIAS_SOLICITADOS',
        'MOTIVO', // Descripción adicional
        'OBSERVACIONES',
        'ESTADO',
        'USUARIO_SOLICITA',
        'FECHA_SOLICITUD',
        'USUARIO_APRUEBA_RH',
        'FECHA_APROBACION_RH',
        'OBSERVACIONES_RH',
        'AFECTA_SALARIO',
    ];

    // Agregar relaciones
    public function motivo()
    {
        return $this->belongsTo(PlaPermisoMotivos::class, 'ID_MOTIVO');
    }

        public function solicitante()
    {
        return $this->belongsTo(User::class, 'USUARIO_SOLICITA');
    }

    public function aprobadorRH()
    {
        return $this->belongsTo(User::class, 'USUARIO_APRUEBA_RH');
    }
    public function documentos()
    {
        return $this->hasMany(PlaPermisoPersonalDocumento::class, 'ID_PERMISO_PERSONAL');
    }

    public function documentosRequeridos()
    {
        return $this->hasManyThrough(
            PlaPermisoMotivoDocumento::class,
            PlaPermisoMotivos::class,
            'ID', // FK en motivos
            'ID_MOTIVO', // FK en motivo_documentos
            'ID_MOTIVO', // Local key en permisos
            'ID' // Local key en motivos
        )->with('tipoDocumento');
    }
    public function documentosObligatoriosFaltantes()
    {
        $documentosRequeridos = $this->motivo->motivoDocumentos;
        $documentosSubidos = $this->documentos;

        return $documentosRequeridos->filter(function ($requerido) use ($documentosSubidos) {
            return !$documentosSubidos->contains('ID_TIPO_DOCUMENTO', $requerido->ID_TIPO_DOCUMENTO);
        });
    }

    public function tieneTodosDocumentos()
    {
        return $this->documentosObligatoriosFaltantes()->isEmpty();
    }

    protected $casts = [
        'FECHA_INICIO' => 'date',
        'FECHA_FIN' => 'date',
        'FECHA_SOLICITUD' => 'datetime',
        'FECHA_APROBACION_RH' => 'datetime',
        'FECHA_CREACION' => 'datetime',
        'ULTIMA_ACTUALIZACION' => 'datetime',
        'DIAS_SOLICITADOS' => 'integer',
        'USUARIO_SOLICITA' => 'integer',
        'USUARIO_APRUEBA_RH' => 'integer',
    ];

    // Relaciones
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'PERSONAL_ID', 'COD_PERSONAL');
    }


    public function usuarioSolicita()
    {
        return $this->belongsTo(User::class, 'USUARIO_SOLICITA', 'id');
    }

    public function usuarioApruebaRH()
    {
        return $this->belongsTo(User::class, 'USUARIO_APRUEBA_RH', 'id');
    }

    // Accessors
    public function getEstadoLabelAttribute()
    {
        return match ($this->ESTADO) {
            self::ESTADO_PENDIENTE => 'Pendiente RH',
            self::ESTADO_APROBADO_RH => 'Aprobado por RH',
            self::ESTADO_RECHAZADO_RH => 'Rechazado por RH',
            self::ESTADO_ACTIVO => 'En Vigencia',
            self::ESTADO_COMPLETADO => 'Completado',
            self::ESTADO_CANCELADO => 'Cancelado',
            default => 'Estado Desconocido'
        };
    }


    public function getAfectaSalarioLabelAttribute()
    {
        return $this->AFECTA_SALARIO === 'S' ? 'Sí' : 'No';
    }

    public function getDiasRestantesAttribute()
    {
        if ($this->ESTADO === self::ESTADO_ACTIVO) {
            $hoy = Carbon::now()->startOfDay();
            $fin = Carbon::parse($this->FECHA_FIN)->startOfDay();

            if ($fin->greaterThan($hoy)) {
                return $hoy->diffInDays($fin) + 1;
            }
        }
        return 0;
    }

    public function getEstaVigenteAttribute()
    {
        $hoy = Carbon::now()->startOfDay();
        $inicio = Carbon::parse($this->FECHA_INICIO)->startOfDay();
        $fin = Carbon::parse($this->FECHA_FIN)->startOfDay();

        return $this->ESTADO === self::ESTADO_APROBADO_RH &&
            $hoy->greaterThanOrEqualTo($inicio) &&
            $hoy->lessThanOrEqualTo($fin);
    }

    // Métodos de negocio
    public function puedeAprobar()
    {
        return $this->ESTADO === self::ESTADO_PENDIENTE;
    }

    public function puedeRechazar()
    {
        return $this->ESTADO === self::ESTADO_PENDIENTE;
    }

    public function puedeCancelar()
    {
        return in_array($this->ESTADO, [
            self::ESTADO_PENDIENTE,
            self::ESTADO_APROBADO_RH
        ]);
    }

    public function puedeEditar()
    {
        return $this->ESTADO === self::ESTADO_PENDIENTE;
    }

    // Scopes
    public function scopePendientes($query)
    {
        return $query->where('ESTADO', self::ESTADO_PENDIENTE);
    }

    public function scopeAprobados($query)
    {
        return $query->where('ESTADO', self::ESTADO_APROBADO_RH);
    }

    public function scopeVigentes($query)
    {
        $hoy = Carbon::now()->startOfDay();
        return $query->where('ESTADO', self::ESTADO_APROBADO_RH)
            ->where('FECHA_INICIO', '<=', $hoy)
            ->where('FECHA_FIN', '>=', $hoy);
    }

    public function scopeDelMes($query, $mes = null, $año = null)
    {
        $mes = $mes ?? Carbon::now()->month;
        $año = $año ?? Carbon::now()->year;

        return $query->whereMonth('FECHA_INICIO', $mes)
            ->whereYear('FECHA_INICIO', $año);
    }
  public function aprobador()
    {
        return $this->belongsTo(User::class, 'USUARIO_APRUEBA_RH');
    }
    // Boot method para calcular días automáticamente y establecer valores por defecto
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($permiso) {
            // Establecer usuario que solicita si no está definido
            if (!$permiso->USUARIO_SOLICITA) {
                $permiso->USUARIO_SOLICITA = auth()->id();
            }

            // Establecer fecha de solicitud si no está definida
            if (!$permiso->FECHA_SOLICITUD) {
                $permiso->FECHA_SOLICITUD = now();
            }

            // Establecer valores por defecto
            if (!$permiso->AFECTA_SALARIO) {
                $permiso->AFECTA_SALARIO = 'N';
            }

            if (!$permiso->ESTADO) {
                $permiso->ESTADO = self::ESTADO_PENDIENTE;
            }
            $user = auth()->user();
            if (!$user->esAdmin() && $user->personal) {
                $permiso->PERSONAL_ID = $user->personal->COD_PERSONAL;
            }
            // Asignar aprobador por defecto si no se especifica
            if (empty($permiso->USUARIO_APRUEBA_RH)) {
                $defaultApprover = User::whereHas('roles', fn($q) => $q->where('name', 'approver'))
                    ->first();
                $permiso->USUARIO_APRUEBA_RH = $defaultApprover?->id;
            }
        });

        static::saving(function ($permiso) {
            // Calcular días automáticamente
            if ($permiso->FECHA_INICIO && $permiso->FECHA_FIN) {
                $inicio = Carbon::parse($permiso->FECHA_INICIO);
                $fin = Carbon::parse($permiso->FECHA_FIN);
                $permiso->DIAS_SOLICITADOS = $inicio->diffInDays($fin) + 1;
            }
        });
    }
}
