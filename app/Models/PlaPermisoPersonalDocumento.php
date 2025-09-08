<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PlaPermisoPersonalDocumento extends Model
{
  protected $table = 'PLA_PERMISO_PERSONAL_DOCUMENTOS';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ID_PERMISO_PERSONAL',
        'ID_TIPO_DOCUMENTO',
        'RUTA',
        'NOMBRE_DOCUMENTO',
        'FECHA',
        'ESTADO'
    ];

    protected $casts = [
        'FECHA' => 'datetime',
        'ESTADO' => 'boolean',
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(PlaPermisoTipoDocumento::class, 'ID_TIPO_DOCUMENTO');
    }

    public function permiso()
    {
        return $this->belongsTo(PlaPermisosPersonal::class, 'ID_PERMISO_PERSONAL');
    }

protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Asegurar que el nombre del documento se guarde correctamente
            if (empty($model->NOMBRE_DOCUMENTO) && !empty($model->RUTA)) {
                $model->NOMBRE_DOCUMENTO = basename($model->RUTA);
            }

            if (empty($model->FECHA)) {
                $model->FECHA = now();
            }
        });

       
    }
}
