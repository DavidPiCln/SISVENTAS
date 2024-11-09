<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Compania;
use App\Models\Detalleventa;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index');
    }

    public function store(Request $request)
    {
        $datosVenta = $request->all();
        $id_cliente = $datosVenta['id_cliente'];

        // Registrar venta
        $total = Cart::subtotal();
        if ($total > 0) {
            $userId = Auth::id();
            $sale = Venta::create([
                'total' => $total,
                'id_cliente' => $id_cliente,
                'id_usuario' => $userId,
            ]);

            if ($sale) {
                DB::beginTransaction();
                try {
                    foreach (Cart::content() as $item) {
                        $producto = Producto::find($item->id);

                        // Validar que la cantidad no sea menor que 1 ni mayor que el stock disponible
                        if ($item->qty < 1 || $item->qty > $producto->stock) {
                            // Revertir la transacción en caso de error
                            DB::rollBack();
                            return response()->json([
                                'icon' => 'error',
                                'title' => 'Cantidad no válida para el producto: ' . $producto->producto,
                            ], 422);
                        }

                        // Restar la cantidad vendida al stock disponible
                        $producto->stock -= $item->qty;

                        // Guardar los cambios en el producto
                        $producto->save();
                    }

                    // Crear los detalles de venta después de validar todo
                    foreach (Cart::content() as $item) {
                        Detalleventa::create([
                            'precio' => $item->price,
                            'cantidad' => $item->qty,
                            'id_producto' => $item->id,
                            'id_venta' => $sale->id
                        ]);
                    }

                    // Confirmar la transacción
                    DB::commit();

                    // Limpiar el carrito de compras después de completar la venta
                    Cart::destroy();

                    // Retornar una respuesta exitosa al cliente
                    return response()->json([
                        'title' => 'VENTA GENERADA',
                        'icon' => 'success',
                        'ticket' => $sale->id
                    ]);
                } catch (\Exception $e) {
                    // Revertir la transacción en caso de error
                    DB::rollBack();

                    // Regresar un error al cliente
                    return response()->json([
                        'title' => 'Error',
                        'icon' => 'alerta',
                        'error' => 'Error al procesar la venta: ' . $e->getMessage()
                    ], 500);
                }
            } else {
                return response()->json([
                    'title' => 'Error',
                    'icon' => 'alerta',
                    'error' => 'Error al crear la venta'
                ], 500);
            }
        } else {
            return response()->json([
                'title' => 'CARRITO VACIO',
                'icon' => 'warning'
            ]);
        }
    }

    public function ticket($id)
    {
        $data['company'] = Compania::first();

        $data['venta'] = Venta::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
            ->select('ventas.*', 'clientes.nombre', 'clientes.telefono', 'clientes.direccion')
            ->where('ventas.id', $id)
            ->first();

        $data['productos'] = Detalleventa::join('productos', 'detalleventa.id_producto', '=', 'productos.id')
            ->select('detalleventa.*', 'productos.producto')
            ->where('detalleventa.id_venta', $id)
            ->get();

        $fecha_venta = $data['venta']['created_at'];
        $data['fecha'] = date('d/m/Y', strtotime($fecha_venta));
        $data['hora'] = date('h:i A', strtotime($fecha_venta));
        // Generar el contenido del ticket en HTML
        $html = View::make('venta.ticket', $data)->render();
        //Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // Generar el PDF utilizando laravel-dompdf
        //$pdf = Pdf::loadHTML($html)->setPaper([0, 0, 226.77, 500], 'portrait')->setWarnings(false);
        $pdf = Pdf::loadHTML($html)->setPaper([0, 0, 140, 500], 'portrait')->setWarnings(false);

        return $pdf->stream('ticket.pdf');
    }

    public function show()
    {
        return view('venta.show');
    }

    public function cliente(Request $request)
    {
        $term = $request->get('term');
        $clients = Cliente::where('nombre', 'LIKE', '%' . $term . '%')
            ->select('id', 'nombre AS label', 'telefono', 'direccion')
            ->limit(10)
            ->get();
        return response()->json($clients);
    }
}
