<?php

namespace App\Http\Controllers;

use App\Models\FellowProcedimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getCurrentUser(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'usuario' => $user->usuario,
            'email' => $user->email,
            'type' => $user->type,
            'number' => $user->number, // DNI
            'telephone' => $user->telephone
        ]);
    }
}
