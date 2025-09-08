<?php

namespace App\Http\Controllers;

use App\Models\MaeAuxiliar;
use App\Models\User;
use Illuminate\Http\Request;

class ResidenteController extends Controller
{
    public function index(Request $request)
    {
       $residente= User::where('type', 'residente')->get();
       return response()->json($residente);
    }
}
