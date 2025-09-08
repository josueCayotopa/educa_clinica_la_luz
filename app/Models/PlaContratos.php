<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaContratos extends Model
{
    use HasFactory;

    protected $table = 'PLA_CONTRATOS';

    // Definir clave primaria compuesta
    protected $primaryKey = ['COD_EMPRESA', 'COD_PERSONAL', 'COD_CONTRATO'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [

    'COD_EMPRESA',
    'COD_PERSONAL',
    'COD_CONTRATO',
    'DES_CONTRATO',
    'FEC_INICIO',       // ← AÑADIR
    'FEC_FIN',          // ← AÑADIR
    'FEC_PRORROGA',     // ← AÑADIR
    'TIP_CONTRATO',
    'ESTADO',
    'COD_TIP_PLANILLA',
    'IND_PRORROGA',
    'NRO_PRORROGA',
    'SUELDO',
    'DURACION',
    'DIAS',
    'DES_HORARIO',
    'COD_GRUPO',
    'IND_CONTRATO',
    'NUM_PORCENTAJE_BEN',
    'NUM_PORCENTAJE_CTS',
    'DES_ARCHIVO',
    'NOM_ARCHIVO_CONTRATO',

    ];
   

    /**
     * Override para manejar clave primaria compuesta
     */
    protected function setKeysForSaveQuery($query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the value of the model's primary key for save queries.
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

    /**
     * Crear un identificador único para las rutas
     */
    public function getRouteKey()
    {
        return $this->COD_CONTRATO . '-' . $this->COD_PERSONAL;
    }

    /**
     * Resolver el modelo usando el identificador compuesto
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $keys = explode('-', $value);
        if (count($keys) !== 2) {
            return null;
        }

        return $this->where('COD_CONTRATO', $keys[0])
            ->where('COD_PERSONAL', $keys[1])
            ->first();
    }

    // Relaciones
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'COD_PERSONAL', 'COD_PERSONAL');
    }

    public function tipoPlanilla()
    {
        return $this->belongsTo(PlaTipoPlanilla::class, 'COD_TIP_PLANILLA', 'COD_TIPO_PLANILLA');
    }
}
