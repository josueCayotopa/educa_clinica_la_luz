<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeProvincia extends Model
{
    use HasFactory;
    protected $table = 'MAE_PROVINCIA';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $primaryKey = 'COD_PROVINCIA';
    protected $fillable =[
        'COD_DEPARTAMENTO',
        'COD_PROVINCIA',
        'DES_PROVINCIA',
        'IND_BAJA',
        'FEC_BAJA'
    ];
    public function departamento()
    {
        return $this->belongsTo(MaeDepartamento::class, 'COD_DEPARTAMENTO', 'COD_DEPARTAMENTO');
    }
}
