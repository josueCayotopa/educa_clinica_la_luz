<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PlaPersonalEvaluado extends Model
{

    protected $table = 'PLA_PERSONAL_EVALUADO';
    protected $primaryKey = 'ID';
    // Si tus columnas reales son CREATED_AT / UPDATED_AT:
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $fillable = [
        'PERSONAL_ID',
        'AREA_ID',
        'USUARIO_CREA',
        'FECHA_INGRESO',
        'TIPO_CONTRATO',
        'FECHA_TERMINO',
        'DESCRIPCION',
        'ESTADO',
        'JEFE_ASIGNADO',
        'ESTADO_EVALUACION',
        'EVALUACION_RH',
        'EVALUACION_JEFE',
        'RECOMENDACIONES_RH',
        'RECOMENDACIONES_JEFE',
        'RECOMENDACION_FINAL',
        'JUSTIFICACION'
    ];
    protected $casts = [
        'FECHA_INGRESO' => 'datetime',
        'FECHA_TERMINO' => 'date',
        'CREATED_AT' => 'datetime',
        'UPDATED_AT' => 'datetime',
        'EVALUACION_RH' => 'array',
        'EVALUACION_JEFE' => 'array'
    ];



    protected $with = ['personal', 'area', 'jefeAsignado'];
    // LECTURA: quita espacios
    public function getPersonalIdAttribute($value)
    {
        return is_string($value) ? rtrim($value) : $value;
    }

    public function getAreaIdAttribute($value)
    {
        return is_string($value) ? rtrim($value) : $value;
    }

    // ESCRITURA: guarda sin espacios
    public function setPersonalIdAttribute($value)
    {
        $this->attributes['PERSONAL_ID'] = is_string($value) ? rtrim($value) : $value;
    }

    public function setAreaIdAttribute($value)
    {
        $this->attributes['AREA_ID'] = is_string($value) ? rtrim($value) : $value;
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'PERSONAL_ID', 'COD_PERSONAL');
    }

    public function area()
    {
        return $this->belongsTo(MaeAreas::class, 'AREA_ID', 'COD_AREAS');
    }

    public function usuarioCreador()
    {
        return $this->belongsTo(User::class, 'USUARIO_CREA', 'id');
    }
    public function jefeAsignado()
    {
        return $this->belongsTo(User::class, 'JEFE_ASIGNADO', 'id');
    }
}
