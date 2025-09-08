<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaVacacionesMes extends Model
{
    use HasFactory;
    
    protected $table = 'PLA_VACACIONES_MES';
    protected $primaryKey = ['COD_CORR_VAC', 'COD_PERSONAL'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'COD_PERSONAL',
        'COD_EMPRESA',
        'ANO_PROCESO',
        'COD_PERIODO',
        'MES_PROCESO',
        'COD_CORR_VAC',
        'COD_NUM_SEC',
        'NUM_DIAS',
        'FEC_INICIO',
        'COD_USER_ACTUAL',
        'FEC_ACTUALIZA',
        'FEC_FINAL',
        'TIP_VACACIONES',
        'IMP_ADELANTO_VAC',
        'IND_PROC_PLAN',
        'NUM_PROCESO_VACACIONES',
        'ANO_APLICA',
        'MES_APLICA',
        'IND_ING_PROC',
        'IND_TRANSF_MOVI'
    ];

    protected $casts = [
        'FEC_INICIO' => 'date',
        'FEC_FINAL' => 'date',
        'FEC_ACTUALIZA' => 'datetime',
        'NUM_DIAS' => 'integer',
        'ANO_PROCESO' => 'integer',
        'MES_PROCESO' => 'integer',
    ];

    /**
     * Relación con Personal
     */
    public function personal()
    {
        return $this->belongsTo(Personal::class, 'COD_PERSONAL', 'COD_PERSONAL');
    }

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
}
