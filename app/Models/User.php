<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Tipos de roles para el sistema de permisos
    const TIPO_ADMIN = 'admin';
    const TIPO_RH = 'recursos_humanos';
    const TIPO_ADMIN_AREA = 'admin_area';
    const TIPO_SUPERVISOR = 'supervisor';
    const TIPO_SEGURIDAD = 'seguridad';
    const TIPO_USUARIO = 'usuario';
    const TIPO_SIN_ACCESO = 'sin_acceso';

    protected $fillable = [
        'name',
        'usuario',
        'type',
        'type_sis_permiso',
        'area_responsable',
        'email',
        'TIPO_EVALUADOR_FELLOW',
        'password',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'active' => 'boolean',
    ];

    // Relaciones
    public function usu_personal()
    {
        return $this->belongsTo(MaeUsuario::class, 'usuario', 'COD_USUARIO');
    }
public function canViewAllFellowEvals(): bool
{
    return strtoupper((string)($this->TIPO_EVALUADOR_FELLOW ?? 'OWN')) === 'ALL'
        || ($this->type ?? null) === 'admin';
}

    public function personal()
    {
        return $this->hasOneThrough(
            Personal::class,
            MaeUsuario::class,
            'COD_USUARIO',
            'COD_PERSONAL',
            'usuario',
            'COD_PERSONAL'
        );
    }
    public static function tiposValidos(): array
    {
        return [
            self::TIPO_ADMIN        => 'Administrador',
            self::TIPO_RH           => 'Recursos Humanos',
            self::TIPO_ADMIN_AREA   => 'Admin. de Área',
            self::TIPO_SUPERVISOR   => 'Supervisor',
            self::TIPO_SEGURIDAD    => 'Seguridad',
            self::TIPO_USUARIO      => 'Usuario',
            self::TIPO_SIN_ACCESO   => 'Sin acceso',
        ];
    }

    public function permisosCreados()
    {
        return $this->hasMany(PlaPersonalSalidaFecha::class, 'USUARIO_CREA');
    }

    public function permisosAprobados()
    {
        return $this->hasMany(PlaPersonalSalidaFecha::class, 'USUARIO_APRUEBA');
    }

    public function salidasControladas()
    {
        return $this->hasMany(PlaPersonalSalidaFecha::class, 'USUARIO_SEGURIDAD_SALIDA');
    }

    public function entradasControladas()
    {
        return $this->hasMany(PlaPersonalSalidaFecha::class, 'USUARIO_SEGURIDAD_ENTRADA');
    }

    public function permisosEspecialesSolicitados()
    {
        return $this->hasMany(PlaPermisosPersonal::class, 'USUARIO_SOLICITA', 'id');
    }

    public function permisosEspecialesAprobados()
    {
        return $this->hasMany(PlaPermisosPersonal::class, 'USUARIO_APRUEBA_RH', 'id');
    }

    // Accessors
    public function getNombrePersonalAttribute()
    {
        return $this->personal ? $this->personal->nombre_completo : 'Sin personal asignado';
    }

    public function getAreaPersonalAttribute()
    {
        return $this->personal && $this->personal->area ? $this->personal->area->DES_AREAS : 'Sin área';
    }

    public function getTipoSisPermisoLabelAttribute()
    {
        return match ($this->type_sis_permiso) {
            self::TIPO_ADMIN => 'Administrador',
            self::TIPO_RH => 'Recursos Humanos',
            self::TIPO_ADMIN_AREA => 'Admin. de Área',
            self::TIPO_SUPERVISOR => 'Supervisor',
            self::TIPO_SEGURIDAD => 'Seguridad',
            self::TIPO_USUARIO => 'Usuario',
            self::TIPO_SIN_ACCESO => 'Sin Acceso',
            default => 'No Definido'
        };
    }

    public function getTipoSisPermisoColorAttribute()
    {
        return match ($this->type_sis_permiso) {
            self::TIPO_ADMIN => 'danger',
            self::TIPO_RH => 'purple',
            self::TIPO_ADMIN_AREA => 'orange',
            self::TIPO_SUPERVISOR => 'warning',
            self::TIPO_SEGURIDAD => 'info',
            self::TIPO_USUARIO => 'success',
            self::TIPO_SIN_ACCESO => 'gray',
            default => 'gray'
        };
    }

    // Métodos de verificación de roles (optimizados)
    public function tieneRol($roles): bool
    {
        if (!is_array($roles)) {
            $roles = [$roles];
        }
        return in_array($this->type_sis_permiso, $roles);
    }

    public function esAdmin(): bool
    {
        return $this->tieneRol(self::TIPO_ADMIN);
    }

    public function esRecursosHumanos(): bool
    {
        return $this->tieneRol(self::TIPO_RH);
    }

    public function esAdminArea(): bool
    {
        return $this->tieneRol(self::TIPO_ADMIN_AREA);
    }
    public function esAdminOrRH(): bool
    {
        return $this->tieneRol([self::TIPO_ADMIN, self::TIPO_RH]);
    }
    public function esSupervisor(): bool
    {
        return $this->tieneRol(self::TIPO_SUPERVISOR);
    }

    public function esSeguridad(): bool
    {
        return $this->tieneRol(self::TIPO_SEGURIDAD);
    }

    public function esUsuarioNormal(): bool
    {
        return $this->tieneRol(self::TIPO_USUARIO);
    }

    // Métodos de permisos (optimizados)
    public function puedeAccederSistemaPermisos(): bool
    {
        return $this->active && !$this->tieneRol(self::TIPO_SIN_ACCESO);
    }

    public function puedeAprobarPermisos(): bool
    {
        return $this->tieneRol([self::TIPO_ADMIN, self::TIPO_RH, self::TIPO_ADMIN_AREA]);
    }

    public function puedeControlarSeguridad(): bool
    {
        return $this->tieneRol([self::TIPO_ADMIN, self::TIPO_SEGURIDAD]);
    }

    public function puedeAprobarPermisosEspeciales(): bool
    {
        return $this->tieneRol([self::TIPO_ADMIN, self::TIPO_RH]);
    }

    public function puedeSolicitarPermisosEspeciales(): bool
    {
        return $this->tieneRol([
            self::TIPO_ADMIN,
            self::TIPO_RH,
            self::TIPO_ADMIN_AREA,
            self::TIPO_SUPERVISOR,
            self::TIPO_USUARIO
        ]);
    }

    public function puedeVerTodosLosPermisos(): bool
    {
        return $this->tieneRol([
            self::TIPO_ADMIN,
            self::TIPO_RH,
            self::TIPO_ADMIN_AREA,
            self::TIPO_SUPERVISOR
        ]);
    }

    // Método mejorado para aprobación de permisos
    public function puedeAprobarPermiso(PlaPermisosPersonal $permiso): bool
    {
        if ($this->esAdmin()) {
            return true;
        }

        // RH puede aprobar cualquier permiso sin aprobador asignado
        if ($this->esRecursosHumanos() && !$permiso->USUARIO_APRUEBA_RH) {
            return true;
        }

        // Admin de área puede aprobar permisos de su área
        if (
            $this->esAdminArea() && $this->personal && $permiso->personal &&
            $this->personal->area_id === $permiso->personal->area_id
        ) {
            return true;
        }

        // Supervisor puede aprobar permisos de su equipo
        if (
            $this->esSupervisor() && $permiso->personal &&
            $this->esSupervisorDe($permiso->personal)
        ) {
            return true;
        }

        return false;
    }

    public function esSupervisorDe(Personal $personal): bool
    {
        // Implementa lógica para determinar si el usuario es supervisor del personal dado
        // Por ejemplo:
        return $this->personal && $this->personal->COD_PERSONAL === $personal->SUPERVISOR_ID;
    }
protected static function booted()
{
    static::creating(function ($user) {
        if (empty($user->api_token)) {
            $user->api_token = (string) Str::uuid(); // 36 chars
        }
    });
}
    // Método para obtener aprobadores disponibles
    public static function aprobadoresDisponibles(): array
    {
        return self::whereIn('type_sis_permiso', [
            self::TIPO_ADMIN,
            self::TIPO_RH,
            self::TIPO_ADMIN_AREA
        ])->active()->get()->mapWithKeys(function ($user) {
            return [$user->id => $user->name . ' (' . $user->tipo_sis_permiso_label . ')'];
        })->toArray();
    }

    // Scope para usuarios activos
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
