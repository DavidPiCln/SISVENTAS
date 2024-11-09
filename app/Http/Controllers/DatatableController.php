<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Venta;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;



class DatatableController extends Controller
{


    public function products()
    {
        $products = Producto::select('id', 'codigo', 'stock', 'producto', 'precio_compra', 'precio_venta', 'foto')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($products)->toJson();
    }

    public function clients()
    {
        $clients = Cliente::select('id', 'nombre', 'telefono', 'direccion')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($clients)->toJson();
    }

    public function users()
    {
        $users = User::select('id', 'name', 'email', 'profile_photo_path')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($users)->toJson();
    }

    public function categories()
    {
        $categories = Categoria::select('id', 'nombre')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($categories)->toJson();
    }

    public function sales()
    {
        $sales = Venta::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->select('ventas.*', 'clientes.nombre')
            ->orderBy('ventas.id', 'desc')->get();
        return DataTables::of($sales)->toJson();
    }

    public function roles()
    {
        $roles = Role::select('id', 'name')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($roles)->toJson();
    }

    public function permisos()
    {
        $permisos = Permission::select('id', 'name')
            ->orderBy('id', 'desc')->get();
        return DataTables::of($permisos)->toJson();
    }
}
