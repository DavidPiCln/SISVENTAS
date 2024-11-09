<!DOCTYPE html>
<html>

<head>
    <title>Factura</title>
    <style>
        @page {
            size: letter;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff; /* Fondo blanco */
        }

        .invoice {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header img {
            max-width: 100px;
            height: auto;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .invoice-details {
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .invoice-details h3 {
            margin-bottom: 5px;
            color: #3498db; /* Azul */
            font-size: 18px; /* Aumentar tamaño del texto */
        }

        .invoice-details p {
            margin: 5px 0;
            color: #666; /* Gris */
            font-size: 14px; /* Aumentar tamaño del texto */
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px; /* Aumentado el margen */
        }

        .invoice-table th,
        .invoice-table td {
            padding: 15px; /* Aumentado el padding */
            border: 1px solid #ccc;
            text-align: left;
            font-size: 16px; /* Aumentar tamaño del texto */
        }

        .invoice-table th {
            background-color: #c5eff7; /* Celeste */
            color: #333; /* Negro */
            font-size: 18px; /* Aumentar tamaño del texto */
        }

        .invoice-total {
            text-align: right;
        }

        .invoice-total h4 {
            margin: 0;
            color: #333;
        }

    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <img src="vendor/adminlte/dist/img/Pudin-chan.jpeg" alt="Logo">
        </div>
        <div class="invoice-details">
            <h3>{{$company->nombre}}</h3>
            <p>{{$company->direccion}}</p>
            <p>{{$company->telefono}}</p>
            <p>{{$company->correo}}</p>
        </div>
        <div class="invoice-details">
            <p>Fecha: {{ $fecha . ' ' . $hora }}</p>
            <p>Folio: {{ $venta->id }}</p>
            <p>Cliente: {{ $venta->nombre}}</p>
            <p>Teléfono: {{ $venta->telefono }}</p>
            <p>Dirección: {{ $venta->direccion }}</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th style="width: 20%;">Cantidad</th> <!-- Ajustar la anchura de las columnas -->
                    <th style="width: 60%;">Producto</th>
                    <th style="width: 20%;">Importe</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->producto }}</td>
                    <td>Q{{ $producto->precio }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td class="invoice-total">Q{{ $venta->total }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
