<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        $registro = Registro::all();
    }

    public function create()
    {
        return view();
    }

    public function store(Request $request, Registro $registro)
    {
        $validate = $request->validate([
            'data' => "date_format:Y-m-d",
            'tipo' => "string",
            'funcionario_id' => "integer",
            'hora' => "date_format:H:i:s"
        ]);

        Registro::create([
            'data' => $validate['data'],
            'tipo' => $validate['tipo'],
            'funcionario_id' => $validate['funcionario_id'],
            'hora' => $validate['hora']
        ]);
        
        return back();
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        return view();
    }

    public function update(Request $request, Registro $registro)
    {
        $validate = $request->validate([
            'data' => "date_format:d/m/Y",
            'tipo' => "string",
            'funcionario_id' => "integer",
            'hora' => "date_format:H:i"
        ]);

        $registro->update([
            'data' => $validate['data'],
            'tipo' => $validate['tipo'],
            'funcionario_id' => $validate['funcionario_id'],
            'hora' => $validate['hora']
        ]);
        
        return back();
    }
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return back();
    }
}
