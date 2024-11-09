<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all(); // Obtener todos los roles
        return view('usuario.rol.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = new Role();
        return view('usuario.rol.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = Role::create(['name' => $request -> input('nombre')]);
        return redirect()->route('roles.index')->with('success', 'Rol creado.');
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
        $role = Role::find($id);
        $permisos = Permission::all();
        return view('usuario.rolesPermisos', compact('role','permisos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permisos); 
        return redirect()->route('roles.edit', $role);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
