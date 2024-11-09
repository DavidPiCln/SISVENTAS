<?php

namespace App\Http\Controllers;

use App\Models\Compania;
use Illuminate\Http\Request;

/**
 * Class CompaniaController
 * @package App\Http\Controllers
 */
class CompaniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtenemos la primera compañía en la base de datos
        $compania = Compania::first();
        return view('compania.index', compact('compania'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compania  $compania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compania $compania)
    {
        // Validación de los campos antes de la actualización
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:255',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Actualizamos la compañía con los nuevos datos
        $compania->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('compania.index')
            ->with('success', 'Datos de la compañía actualizados correctamente.');
    }
}
