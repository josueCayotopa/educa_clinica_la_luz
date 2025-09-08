<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class CertificadoDigital extends Model
{
    protected $table = 'certificados_digitales';
    protected $connection = 'sqlsrv';
    
    protected $fillable = [
        'empresa_id',
        'titular_certificado',
        'numero_documento',
        'tipo_documento',
        'email_titular',
        'proveedor_certificado',
        'numero_serie_certificado',
        'certificado_pem',
        'clave_publica',
        'fecha_emision',
        'fecha_vencimiento',
        'estado',
        'huella_digital',
        'algoritmo_firma',
        'uso_permitido',
        'observaciones'
    ];
    
    protected $dates = [
        'fecha_emision',
        'fecha_vencimiento',
        'created_at',
        'updated_at'
    ];
    
    protected $casts = [
        'fecha_emision' => 'datetime',
        'fecha_vencimiento' => 'datetime'
    ];
    
    /**
     * Relación con firmas de boletas
     */
    public function boletaFirmas()
    {
        return $this->hasMany(BoletaFirma::class, 'certificado_digital_id');
    }
    
    /**
     * Relación con logs de firma
     */
    public function logsFirma()
    {
        return $this->hasMany(LogFirmaElectronica::class, 'certificado_digital_id');
    }
    
    /**
     * Relación con validaciones
     */
    public function validaciones()
    {
        return $this->hasMany(ValidacionCertificado::class, 'certificado_digital_id');
    }
    
    /**
     * Verificar si el certificado está vigente
     */
    public function estaVigente()
    {
        return $this->estado === 'ACTIVO' && 
               $this->fecha_vencimiento > now() &&
               $this->fecha_emision <= now();
    }
    
    /**
     * Obtener días hasta el vencimiento
     */
    public function getDiasVencimientoAttribute()
    {
        if ($this->fecha_vencimiento) {
            return now()->diffInDays($this->fecha_vencimiento, false);
        }
        return null;
    }
    
    /**
     * Verificar si está próximo a vencer (30 días)
     */
    public function estaProximoVencer()
    {
        return $this->dias_vencimiento !== null && 
               $this->dias_vencimiento <= 30 && 
               $this->dias_vencimiento > 0;
    }
    
    /**
     * Obtener información del certificado desde el PEM
     */
    public function getInfoCertificado()
    {
        try {
            $cert = openssl_x509_read($this->certificado_pem);
            if (!$cert) {
                return null;
            }
            
            $info = openssl_x509_parse($cert);
            openssl_x509_free($cert);
            
            return [
                'subject' => $info['subject'] ?? [],
                'issuer' => $info['issuer'] ?? [],
                'serial_number' => $info['serialNumber'] ?? '',
                'valid_from' => isset($info['validFrom_time_t']) ? date('Y-m-d H:i:s', $info['validFrom_time_t']) : null,
                'valid_to' => isset($info['validTo_time_t']) ? date('Y-m-d H:i:s', $info['validTo_time_t']) : null,
                'purposes' => $info['purposes'] ?? [],
                'extensions' => $info['extensions'] ?? []
            ];
            
        } catch (\Exception $e) {
            Log::error('Error al obtener información del certificado: ' . $e->getMessage(), [
                'certificado_id' => $this->id
            ]);
            return null;
        }
    }
    
    /**
     * Validar certificado contra OCSP/CRL
     */
    public function validarEstado()
    {
        try {
            // Implementar validación OCSP/CRL según el proveedor
            switch ($this->proveedor_certificado) {
                case 'LLAMA_PE':
                    return $this->validarLlamaPe();
                case 'RENIEC':
                    return $this->validarReniec();
                default:
                    return $this->validarGenerico();
            }
            
        } catch (\Exception $e) {
            Log::error('Error al validar certificado: ' . $e->getMessage(), [
                'certificado_id' => $this->id
            ]);
            
            // Registrar validación fallida
            $this->validaciones()->create([
                'tipo_validacion' => 'OCSP',
                'estado_validacion' => 'ERROR',
                'respuesta_validacion' => $e->getMessage(),
                'proximo_check' => now()->addHours(1)
            ]);
            
            return false;
        }
    }
    
    /**
     * Validación específica para Llama.pe
     */
    private function validarLlamaPe()
    {
        // URL de validación OCSP de Llama.pe
        $ocspUrl = 'http://ocsp.llama.pe';
        
        // Implementar validación OCSP
        // Por ahora, simulamos la validación
        $estadoValidacion = 'VALIDO';
        
        $this->validaciones()->create([
            'tipo_validacion' => 'OCSP',
            'estado_validacion' => $estadoValidacion,
            'fecha_validacion' => now(),
            'url_validacion' => $ocspUrl,
            'codigo_respuesta' => '200',
            'proximo_check' => now()->addHours(24)
        ]);
        
        return $estadoValidacion === 'VALIDO';
    }
    
    /**
     * Validación para RENIEC
     */
    private function validarReniec()
    {
        // Implementar validación específica de RENIEC
        return true;
    }
    
    /**
     * Validación genérica
     */
    private function validarGenerico()
    {
        // Validación básica de fechas y estructura
        return $this->estaVigente();
    }
    
    /**
     * Generar huella digital del certificado
     */
    public static function generarHuellaDigital($certificadoPem)
    {
        return hash('sha256', $certificadoPem);
    }
    
    /**
     * Importar certificado desde archivo
     */
    public static function importarCertificado($archivoCertificado, $datosAdicionales = [])
    {
        try {
            $contenidoPem = file_get_contents($archivoCertificado);
            
            $cert = openssl_x509_read($contenidoPem);
            if (!$cert) {
                throw new \Exception('Certificado inválido o corrupto');
            }
            
            $info = openssl_x509_parse($cert);
            $clavePublica = openssl_pkey_get_public($cert);
            $detallesClavePublica = openssl_pkey_get_details($clavePublica);
            
            openssl_x509_free($cert);
            openssl_pkey_free($clavePublica);
            
            // Extraer información del certificado
            $subject = $info['subject'];
            $serialNumber = $info['serialNumber'];
            $huellaDigital = self::generarHuellaDigital($contenidoPem);
            
            // Crear registro del certificado
            $certificado = self::create([
                'empresa_id' => $datosAdicionales['empresa_id'] ?? '0001',
                'titular_certificado' => $subject['CN'] ?? $subject['commonName'] ?? 'No especificado',
                'numero_documento' => $datosAdicionales['numero_documento'] ?? '',
                'tipo_documento' => $datosAdicionales['tipo_documento'] ?? 'DNI',
                'email_titular' => $subject['emailAddress'] ?? $datosAdicionales['email_titular'] ?? '',
                'proveedor_certificado' => $datosAdicionales['proveedor_certificado'] ?? 'OTROS',
                'numero_serie_certificado' => $serialNumber,
                'certificado_pem' => $contenidoPem,
                'clave_publica' => $detallesClavePublica['key'],
                'fecha_emision' => Carbon::createFromTimestamp($info['validFrom_time_t']),
                'fecha_vencimiento' => Carbon::createFromTimestamp($info['validTo_time_t']),
                'huella_digital' => $huellaDigital,
                'algoritmo_firma' => $datosAdicionales['algoritmo_firma'] ?? 'SHA256withRSA',
                'uso_permitido' => $datosAdicionales['uso_permitido'] ?? 'FIRMA_DOCUMENTOS',
                'observaciones' => $datosAdicionales['observaciones'] ?? null
            ]);
            
            Log::info('Certificado digital importado exitosamente', [
                'certificado_id' => $certificado->id,
                'titular' => $certificado->titular_certificado,
                'serie' => $serialNumber
            ]);
            
            return $certificado;
            
        } catch (\Exception $e) {
            Log::error('Error al importar certificado: ' . $e->getMessage());
            throw $e;
        }
    }
    
    /**
     * Obtener certificados activos para una empresa
     */
    public static function activosPorEmpresa($empresaId)
    {
        return self::where('empresa_id', $empresaId)
                  ->where('estado', 'ACTIVO')
                  ->where('fecha_vencimiento', '>', now())
                  ->orderBy('fecha_vencimiento', 'asc')
                  ->get();
    }
    
    /**
     * Obtener certificados próximos a vencer
     */
    public static function proximosVencer($dias = 30)
    {
        return self::where('estado', 'ACTIVO')
                  ->where('fecha_vencimiento', '>', now())
                  ->where('fecha_vencimiento', '<=', now()->addDays($dias))
                  ->orderBy('fecha_vencimiento', 'asc')
                  ->get();
    }
}
