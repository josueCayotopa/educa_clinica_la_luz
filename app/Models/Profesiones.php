<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesiones extends Model
{
    use HasFactory;
    protected $table = 'COD_PROFESION';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'COD_PROFESION',
        'DES_PROFESION',
        'COD_SUNAT',
    ];
}
