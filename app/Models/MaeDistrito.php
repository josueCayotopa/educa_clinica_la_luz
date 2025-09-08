<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaeDistrito extends Model
{
    use HasFactory;
    protected $table = 'MAE_DISTRITO';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $primaryKey = 'COD_DISTRITO';
    protected $fillable= [
        'COD_DEPARTAMENTO',
        'COD_PROVINCIA',
        'COD_DISTRITO',
    ];
}
