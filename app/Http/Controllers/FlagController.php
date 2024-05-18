<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlagController extends Controller
{
    public function store(Request $request, $userId)
    {
        $request->validate([
            'flag_type' => 'required|in:green,red',
        ]);

        // Buscar si ya existe una bandera de este tipo por este usuario
        $existingFlag = Flag::where('user_id', $userId)
            ->where('flagged_by', Auth::id())
            ->where('flag_type', $request->flag_type)
            ->first();

        if ($existingFlag) {
            // Si la bandera ya existe, la eliminamos
            $existingFlag->delete();
            return redirect()->back()->with('success', 'Has quitado la bandera.');
        } else {
            // Si no existe, la creamos
            Flag::create([
                'user_id' => $userId,
                'flagged_by' => Auth::id(),
                'flag_type' => $request->flag_type,
            ]);
            return redirect()->back()->with('success', 'Has puesto una bandera.');
        }
    }
}
