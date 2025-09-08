<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidacionCertificado extends Model
{
    protected $table = 'validaciones_certificados';
    protected $connection = 'sqlsrv';
    
    protected $fillable = [
        'certificado_digital_id',
        'tipo_validacion',
        'estado_validacion',
        'fecha_validacion',
        'respuesta_validacion',
        'url_validacion',
        'codigo_respuesta',
        'proximo_check'
    ];
    
    protected $dates = [
        'fecha_validacion',
        'proximo_check'
    ];
    
    protected $casts = [
        'fecha_validacion' => 'datetime',
        'proximo_check' => 'datetime'
    ];
    
    /**
     * Relación con certificado digital
     */
    public function certificadoDigital()
    {
        return $this->belongsTo(CertificadoDigital::class, 'certificado_digital_id');
    }
}
