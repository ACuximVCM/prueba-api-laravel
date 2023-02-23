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
                <td style="background-color: #364ADD; color: white;">Localizador</td>
                <td style="background-color: #364ADD; color: white;">Canal</td>
                <td style="background-color: #364ADD; color: white;">Hotel</td>
                <td style="background-color: #364ADD; color: white;">Estado</td>
                <td style="background-color: #364ADD; color: white;">Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->localizador }}</td>
                    <td>{{ $venta->canal }}</td>
                    <td>{{ $venta->hotel_venta }}</td>
                    <td>{{ $venta->estado }}</td>
                    <td>{{ $venta->total_mxn_reserva }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>