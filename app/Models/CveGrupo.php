<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CveGrupo extends Model
{
    use HasFactory;
    protected $table = 'CVE_GRUPO';
    protected $primaryKey = 'cod_grupo';
}
