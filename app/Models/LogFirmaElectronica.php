<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogFirmaElectronica extends Model
{
    protected $table = 'logs_firma_electronica';
    protected $connection = 'sqlsrv';
    
    protected $fillable = [
        'boleta_firma_id',
        'certificado_digital_id',
        'accion',
        'resultado',
        'detalles',
        'ip_origen',
        'user_agent',
        'timestamp_accion',
        'duracion_ms'
    ];
    
    protected $dates = [
        'timestamp_accion'
    ];
    
    protected $casts = [
        'timestamp_accion' => 'datetime',
        'duracion_ms' => 'integer'
    ];
    
    /**
     * Relación con boleta firma
     */
    public function boletaFirma()
    {
        return $this->belongsTo(BoletaFirma::class, 'boleta_firma_id');
    }
    
    /**
     * Relación con certificado digital
     */
    public function certificadoDigital()
    {
        return $this->belongsTo(CertificadoDigital::class, 'certificado_digital_id');
    }
    
    /**
     * Registrar acción de firma
     */
    public static function registrarAccion($boletaFirmaId, $certificadoId, $accion, $resultado, $detalles = null, $duracion = null)
    {
        return self::create([
            'boleta_firma_id' => $boletaFirmaId,
            'certificado_digital_id' => $certificadoId,
            'accion' => $accion,
            'resultado' => $resultado,
            'detalles' => $detalles,
            'ip_origen' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'timestamp_accion' => now(),
            'duracion_ms' => $duracion
        ]);
    }
}
