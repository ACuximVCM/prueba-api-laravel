<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>
<body>
    
    <table>
        <thead>
            <tr>
                <td style="background-color: #364ADD; color: white;">Usuario</td>
                <td style="background-color: #364ADD; color: white;">Canal</td>
                <td style="background-color: #364ADD; color: white;">Hotel</td>
                <td style="background-color: #364ADD; color: white;">Estado</td>
                <td style="background-color: #364ADD; color: white;">Total</td>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach ($ventas as $venta)
            @php
                $total = $total + $venta['total_mxn_reserva'];
            @endphp
                <tr>
                    <td>{{ $venta['user']['name'] }}</td>
                    <td>{{ $venta['canal']['canal'] }}</td>
                    <td>{{ $venta['destination']['name'] }}</td>
                    <td>{{ $venta['estado'] }}</td>
                    <td>{{ $venta['total_mxn_reserva'] }}</td>
                </tr>
            @endforeach
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Total venta</td>
                <td>$ {{ $total }} MXN</td>
            </tr>
        </tbody>
    </table>

</body>
</html>