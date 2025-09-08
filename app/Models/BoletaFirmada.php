<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class BoletaFirmada extends Model
{
    use HasFactory;

    protected $table = 'boletas_firmadas';

    protected $fillable = [
        'boleta_firma_id',
        'empresa_id',
        'periodo',
        'anio',
        'mes',
        'cod_personal',
        'nombre_empleado',
        'email_empleado',
        'ruta_archivo_ftp',
        'nombre_archivo',
        'tamano_archivo',   // <--- NUEVO
        'hash_documento',                                      // <--- ya lo tienes
        'fecha_generacion',
        'fecha_envio_correo',
        'enviado_correo',
        'intentos_envio',
        'ultimo_error_envio',
        'publicado_portal',
        'fecha_publicacion_portal',
        'fecha_ultimo_intento',
        'fecha_revocacion',             // si existen
        'estado_documento'
    ];

    protected $casts = [
        'fecha_generacion' => 'datetime',
        'fecha_envio_correo' => 'datetime',
        'fecha_publicacion_portal' => 'datetime',
        'fecha_ultimo_intento' => 'datetime',
        'fecha_revocacion' => 'datetime',
        'enviado_correo' => 'boolean',
        'publicado_portal' => 'boolean',
        'tamano_archivo' => 'integer',
        'anio' => 'integer',
        'mes' => 'integer'
    ];


    // Relaciones
    public function boletaFirma()
    {
        return $this->belongsTo(BoletaFirma::class, 'boleta_firma_id');
    }

    public function empresa()
    {
        return $this->belongsTo(MaeEmpresa::class, 'empresa_id', 'COD_EMPRESA');
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'cod_personal', 'COD_PERSONAL');
    }

    // Scopes
    public function scopeEnviadas($query)
    {
        return $query->where('enviado_correo', true);
    }

    public function scopePendientesEnvio($query)
    {
        return $query->where('enviado_correo', false)
            ->whereNotNull('email_empleado');
    }

    public function scopeConErrores($query)
    {
        return $query->where('enviado_correo', false)
            ->where('intentos_envio', '>', 0);
    }

    public function scopePublicadas($query)
    {
        return $query->where('publicado_portal', true);
    }

    public function scopeDescargadas($query)
    {
        return $query->where('descargado_empleado', true);
    }

    public function scopePorPeriodo($query, $anio, $mes)
    {
        return $query->where('anio', $anio)->where('mes', $mes);
    }

    public function scopePorEmpresa($query, $empresaId)
    {
        return $query->where('empresa_id', $empresaId);
    }

    // Accessors
    public function getNombreMesAttribute()
    {
        $meses = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];

        return $meses[$this->mes] ?? 'Mes ' . $this->mes;
    }

    public function getPeriodoFormateadoAttribute()
    {
        return $this->nombre_mes . ' ' . $this->anio;
    }

    public function getTamañoFormateadoAttribute()
    {
        if (!$this->tamaño_archivo) {
            return 'N/A';
        }

        $bytes = $this->tamaño_archivo;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getEstadoEnvioAttribute()
    {
        if ($this->enviado_correo) {
            return 'enviado';
        } elseif ($this->intentos_envio > 0) {
            return 'error';
        } elseif ($this->email_empleado) {
            return 'pendiente';
        } else {
            return 'sin_email';
        }
    }

    // Métodos auxiliares
    public function estaEnviada()
    {
        return $this->enviado_correo;
    }

    public function tienePendienteEnvio()
    {
        return !$this->enviado_correo && !empty($this->email_empleado);
    }

    public function tieneErrorEnvio()
    {
        return !$this->enviado_correo && $this->intentos_envio > 0;
    }

    public function estaPublicada()
    {
        return $this->publicado_portal;
    }

    public function fueDescargada()
    {
        return $this->descargado_empleado;
    }

    public function marcarComoEnviada()
    {
        $this->update([
            'enviado_correo' => true,
            'fecha_envio_correo' => now()
        ]);
    }

    public function marcarErrorEnvio($error)
    {
        $this->update([
            'intentos_envio' => $this->intentos_envio + 1,
            'ultimo_error_envio' => $error
        ]);
    }

    public function marcarComoPublicada()
    {
        $this->update([
            'publicado_portal' => true,
            'fecha_publicacion' => now()
        ]);
    }

    public function marcarComoDescargada($ip = null)
    {
        $this->update([
            'descargado_empleado' => true,
            'fecha_descarga' => now(),
            'ip_descarga' => $ip ?? request()->ip()
        ]);
    }

    public function obtenerUrlDescarga()
    {
        return route('boletas.firmadas.descargar', $this->id);
    }

    public function obtenerUrlVisualizacion()
    {
        return route('boletas.firmadas.ver', $this->id);
    }
}
