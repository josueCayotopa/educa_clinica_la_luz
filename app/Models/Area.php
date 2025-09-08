<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
   
    protected $table = 'MAE_AREAS';
    protected $primaryKey = 'COD_AREAS';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'COD_AREAS',
        'DES_AREAS'
    ];
    
    // Relación con el modelo Personal
    public function personales()
    {
        return $this->hasMany(Personal::class, 'COD_AREAS', 'COD_AREAS');
    }
}
