<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table = 'PLA_PERSONAL';
    protected $primaryKey = 'COD_PERSONAL';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'COD_EMPRESA',
        'COD_PERSONAL',
        'COD_TIPO_PLANILLA',
        'COD_AUXILIAR',
        'APE_PATERNO',
        'APE_MATERNO',
        'NOM_TRABAJADOR',
        'COD_PROFESION',
        'NUM_VER_AREAS',
        'COD_AREAS',
        'NUM_LIBRETA_MILITAR',
        'NUM_BREVETE',
        'NUM_VER_C_COSTOS',
        'NUM_AUTOGEN_IPSS',
        'COD_C_COSTOS',
        'FEC_NACIMIENTO',
        'TIP_SIT_LABORAL',
        'TIP_SEXO',
        'TIP_ESTADO',
        'TIP_ESTADO_CIVIL',
        'FEC_INGRESO',
        'COD_MONEDA_PAGO',
        'NUM_HIJOS',
        'TIP_PAGO',
        'NUM_GRATIFICACION_EXTRA',
        'TIP_GRADO_INSTRUC',
        'NUM_SUELDO',
        'COD_AUXILIAR_BANCO_PAGO',
        'NUM_GRATIFICACION_ORDI',
        'COD_MONEDA_CTS',
        'IND_ADELA_QUINCENAL',
        'TIP_CUENTA_BANCO_PAGO',
        'COD_CATEGORIA',
        'NUM_CUENTA_BANCO_PAGO',
        'COD_AFP',
        'COD_AUXILIAR_BANCO_CTS',
        'TIP_DEPOSI_CTS',
        'NUM_CUENTA_BANCO_CTS',
        'COD_CARGO',
    ];


    public function moneda()
    {
        return $this->belongsTo(Area::class, 'COD_MONEDA_PAGO', 'COD_MONEDA');
    }
    public function auxiliar()
    {
        return $this->hasOne(MaeAuxiliar::class, 'COD_AUXILIAR', 'COD_AUXILIAR');
    }
    public function empresa()
    {
        return $this->belongsTo(MaeEmpresa::class, 'COD_EMPRESA', 'COD_EMPRESA');
    }
    public function sucursal()
    {
        
    }

    // Relación con el modelo Area
    public function area()
    {
        return $this->belongsTo(MaeAreas::class, 'COD_AREAS', 'COD_AREAS');
    }
    public function cargo()
    {
        return $this->belongsTo(PlaCargos::class, 'COD_CARGO', 'COD_CARGO');
    }
    public function tipo_planilla()
    {
        return $this->belongsTo(PlaTipoPlanilla::class, 'COD_TIPO_PLANILLA', 'COD_TIPO_PLANILLA');
    }
    public function usuario()
    {
        return $this->hasOne(MaeUsuario::class, 'COD_PERSONAL', 'COD_PERSONAL');
    }
    // relacion con contratos 
    public function contratos()
    {
        return $this->hasMany(PlaContratos::class, 'COD_PERSONAL', 'COD_PERSONAL');
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->APE_PATERNO} {$this->APE_MATERNO} {$this->NOM_TRABAJADOR} ";
    }
    public function getNombreCortoAttribute()
    {
        $ap = trim(($this->APE_PATERNO ?? '').' '.($this->APE_MATERNO ?? ''));
        $no = trim($this->NOM_TRABAJADOR ?? '');
        $dni = trim($this->NUM_DOC_IDENTIDAD ?? '');
        $label = trim(($ap ? "$ap, " : '').$no);
        return $dni ? ($label ? "$label ($dni)" : $dni) : ($label ?: trim((string)$this->COD_PERSONAL));
    }
}
