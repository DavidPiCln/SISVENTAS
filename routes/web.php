<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompaniaController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',]) ->group(function () {

        Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [UsuarioController::class, 'profile'] );
    
        Route::resource('usuarios', UsuarioController::class);


        Route::get('/listarUsuarios', [DatatableController::class, 'users'])->name('users.list');



        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('user/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::resource('productos', ProductoController::class);
        Route::resource('clientes', ClienteController::class);
        Route::resource('categorias', CategoriaController::class);
        Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
        Route::resource('usuarios', UsuarioController::class);

        Route::get('/listarProductos', [DatatableController::class, 'products'])->name('products.list');
        Route::get('/listarClientes', [DatatableController::class, 'clients'])->name('clients.list');
        Route::get('/listarUsuarios', [DatatableController::class, 'users'])->name('users.list');
        Route::get('/listarCategorias', [DatatableController::class, 'categories'])->name('categories.list');
        Route::get('/listarVentas', [DatatableController::class, 'sales'])->name('sales.list');
        Route::get('/listarRoles', [DatatableController::class, 'roles'])->name('roles.list');
        Route::get('/listarPermisos', [DatatableController::class, 'permisos'])->name('permisos.list');

        Route::get('/compania', [CompaniaController::class, 'index'])->name('compania.index');
        Route::put('compania/{compania}', [CompaniaController::class, 'update'])->name('compania.update');


        Route::get('/venta', [VentaController::class, 'index'])->name('venta.index');
        Route::get('/venta/show', [VentaController::class, 'show'])->name('venta.show');
        Route::get('/venta/cliente', [VentaController::class, 'cliente'])->name('venta.cliente');
        Route::post('/venta', [VentaController::class, 'store'])->name('venta.store');
        Route::get('/venta/{id}/ticket', [VentaController::class, 'ticket'])->name('venta.ticket');

        
        Route::resource('/roles', RolController::class)->names('roles');
        Route::resource('/permisos', PermisosController::class)->names('permisos');
       
    
});

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


