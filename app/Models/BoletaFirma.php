<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BoletaFirma extends Model
{
    use HasFactory;

    protected $table = 'boleta_firmas';
    protected $connection = 'sqlsrv';
    
    protected $fillable = [
        'empresa_id',
        'periodo',
        'anio',
        'mes',
        'firmado_por',
        'cargo_firmante',
        'tipo_firma',
        'firma_digital',
        'firma_imagen',
        'certificado_digital_id',
        'numero_serie_certificado',
        'titular_certificado',
        'hash_firma',
        'nombre_archivo_original',
        'tipo_mime',
        'incluir_timestamp',
        'fecha_firma',
        'fecha_revocacion',
        'motivo_revocacion',
        'usuario_creacion',
        'usuario_revocacion',
        'observaciones',
        'estado'
    ];
    
    protected $dates = [
        'fecha_firma',
        'fecha_revocacion',
        'created_at',
        'updated_at'
    ];
    
    protected $casts = [
        'anio' => 'integer',
        'mes' => 'integer',
        'incluir_timestamp' => 'boolean',
        'fecha_firma' => 'datetime',
        'fecha_revocacion' => 'datetime',
        'usuario_creacion' => 'integer'
    ];
    
    /**
     * Relación con boletas firmadas
     */
    public function boletasFirmadas()
    {
        return $this->hasMany(BoletaFirmada::class, 'boleta_firma_id');
    }
    
    /**
     * Relación con certificado digital
     */
    public function certificadoDigital()
    {
        return $this->belongsTo(CertificadoDigital::class, 'certificado_digital_id');
    }
    
    /**
     * Obtener la firma para un período específico
     */
    public static function obtenerFirmaPorPeriodo($empresa_id, $anio, $mes)
    {
        try {
            $periodo = $anio . str_pad($mes, 2, '0', STR_PAD_LEFT);
            
            return self::where('empresa_id', $empresa_id)
                      ->where('periodo', $periodo)
                      ->whereIn('estado', ['ACTIVA', 'REVOCADA'])
                      ->first();
                      
        } catch (\Exception $e) {
            Log::error('Error al obtener firma por período: ' . $e->getMessage(), [
                'empresa_id' => $empresa_id,
                'anio' => $anio,
                'mes' => $mes
            ]);
            
            return null;
        }
    }
    
    /**
     * Crear o actualizar una firma para un período
     */
    public static function firmarPeriodo($empresa_id, $anio, $mes, $firmado_por, $cargo_firmante, $firma_digital = null, $firma_imagen = null, $tipo_firma = 'DIGITAL', $observaciones = null)
    {
        try {
            $periodo = $anio . str_pad($mes, 2, '0', STR_PAD_LEFT);
            
            // Verificar si ya existe una firma para este período
            $firmaExistente = self::where('empresa_id', $empresa_id)
                                 ->where('periodo', $periodo)
                                 ->first();
            
            $datosActualizacion = [
                'firmado_por' => $firmado_por,
                'cargo_firmante' => $cargo_firmante,
                'tipo_firma' => $tipo_firma,
                'fecha_firma' => now(),
                'observaciones' => $observaciones,
                'estado' => 'ACTIVA'
            ];
            
            // Agregar firma según el tipo
            if ($tipo_firma === 'DIGITAL' && $firma_digital) {
                $datosActualizacion['firma_digital'] = $firma_digital;
                $datosActualizacion['hash_firma'] = hash('sha256', $firma_digital);
                $datosActualizacion['firma_imagen'] = null;
            } elseif ($tipo_firma === 'IMAGEN' && $firma_imagen) {
                $datosActualizacion['firma_imagen'] = $firma_imagen;
                $datosActualizacion['hash_firma'] = hash('sha256', $firma_imagen);
                $datosActualizacion['firma_digital'] = null;
            }
            
            if ($firmaExistente) {
                // Actualizar la firma existente
                $firmaExistente->update($datosActualizacion);
                
                Log::info('Firma actualizada para período', [
                    'empresa_id' => $empresa_id,
                    'periodo' => $periodo,
                    'firmado_por' => $firmado_por,
                    'tipo_firma' => $tipo_firma
                ]);
                
                return $firmaExistente;
            } else {
                // Crear nueva firma
                $datosCreacion = array_merge($datosActualizacion, [
                    'empresa_id' => $empresa_id,
                    'periodo' => $periodo,
                    'anio' => $anio,
                    'mes' => $mes
                ]);
                
                $nuevaFirma = self::create($datosCreacion);
                
                Log::info('Nueva firma creada para período', [
                    'empresa_id' => $empresa_id,
                    'periodo' => $periodo,
                    'firmado_por' => $firmado_por,
                    'tipo_firma' => $tipo_firma
                ]);
                
                return $nuevaFirma;
            }
            
        } catch (\Exception $e) {
            Log::error('Error al firmar período: ' . $e->getMessage(), [
                'empresa_id' => $empresa_id,
                'anio' => $anio,
                'mes' => $mes,
                'firmado_por' => $firmado_por
            ]);
            
            throw $e;
        }
    }
    
    /**
     * Revocar una firma
     */
    public function revocar($motivo = null)
    {
        try {
            $this->update([
                'estado' => 'REVOCADA',
                'fecha_revocacion' => now(),
                'motivo_revocacion' => $motivo,
                'usuario_revocacion' => auth()->id()
            ]);
            
            Log::info('Firma revocada', [
                'id' => $this->id,
                'empresa_id' => $this->empresa_id,
                'periodo' => $this->periodo,
                'motivo' => $motivo
            ]);
            
            return true;
            
        } catch (\Exception $e) {
            Log::error('Error al revocar firma: ' . $e->getMessage(), [
                'id' => $this->id
            ]);
            
            return false;
        }
    }
    
    /**
     * Obtener el nombre del mes
     */
    public function getNombreMesAttribute()
    {
        $meses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];
        
        return $meses[$this->mes] ?? '';
    }
    
    /**
     * Obtener la URL de la imagen de la firma
     */
    public function getFirmaImagenUrlAttribute()
    {
        if ($this->tipo_firma === 'DIGITAL' && $this->firma_digital) {
            return 'data:image/png;base64,' . $this->firma_digital;
        } elseif ($this->tipo_firma === 'IMAGEN' && $this->firma_imagen) {
            return 'data:image/png;base64,' . $this->firma_imagen;
        }
        
        return null;
    }
    
    /**
     * Verificar si la firma está activa
     */
    public function estaActiva()
    {
        return $this->estado === 'ACTIVA';
    }
    
    /**
     * Verificar si la firma está revocada
     */
    public function estaRevocada()
    {
        return $this->estado === 'REVOCADA';
    }
    
    /**
     * Obtener estadísticas de boletas firmadas
     */
    public function getEstadisticasAttribute()
    {
        return [
            'total_boletas' => $this->boletasFirmadas()->count(),
            'enviadas_correo' => $this->boletasFirmadas()->where('enviado_correo', true)->count(),
            'publicadas_portal' => $this->boletasFirmadas()->where('publicado_portal', true)->count(),
            'pendientes_envio' => $this->boletasFirmadas()->where('enviado_correo', false)->whereNotNull('email_empleado')->count(),
            'con_errores' => $this->boletasFirmadas()->where('intentos_envio', '>', 0)->where('enviado_correo', false)->count(),
            'sin_email' => $this->boletasFirmadas()->whereNull('email_empleado')->count()
        ];
    }
    
    /**
     * Verificar integridad de la firma
     */
    public function verificarIntegridad()
    {
        if ($this->tipo_firma === 'DIGITAL' && $this->firma_digital) {
            $hashActual = hash('sha256', $this->firma_digital);
            return $hashActual === $this->hash_firma;
        } elseif ($this->tipo_firma === 'IMAGEN' && $this->firma_imagen) {
            $hashActual = hash('sha256', $this->firma_imagen);
            return $hashActual === $this->hash_firma;
        }
        
        return true; // Para firmas electrónicas, la verificación es diferente
    }
}
