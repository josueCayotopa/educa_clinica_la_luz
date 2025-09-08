<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaFormula extends Model
{
    use HasFactory;
    protected $table = 'PLA_FORMULA';
    protected $primaryKey = 'COD_FORMULA';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'DES_FORMULA',
    
         
    ]
    ;
    
}
