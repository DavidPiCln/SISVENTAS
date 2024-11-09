<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permission::all(); // Obtener todos los roles
        return view('usuario.permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permisos = new Permission();
        return view('usuario.permisos.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permisos = Permission::create(['name' => $request -> input('nombre')]);
        return redirect()->route('permisos.index')->with('success', 'Permiso creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
