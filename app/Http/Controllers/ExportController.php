<?php

namespace App\Http\Controllers;

use App\Exports\ExcelExport;
use App\Models\Canal;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ExportController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function export(Request $request)
    {
        //realizamos la consulta
        // $reporte = DB::table('reservations')
        //     ->select(
        //         DB::raw("CONCAT('VCM', reservations.id) as localizador"),
        //         'channel.canal',
        //         DB::raw("concat('users.name', ' ', 'users.last_name') as rep_venta"),
        //         'reservations.total_mxn_reserva',
        //         'destinatios.name as hotel_venta',
        //         'reservations.estado'
        //     )
        //     ->join('channel', 'channel.id', '=', 'reservations.id_canal')
        //     ->join('users', 'users.id', '=', 'reservations.id_user')
        //     ->join('destinatios', 'destinatios.id', '=', 'reservations.hotel_id')
        //     ->whereIn('reservations.id_canal', [1, 3])
        //     ->where('reservations.estado', '=', 'PAGADA')
        //     ->where('reservations.created_at', '>=', $request->post('desde'))
        //     ->where('reservations.created_at', '<=', $request->post('hasta'))
        //     ->get();

        $reservas = Reservation::with(['canal', 'user', 'destination'])
            ->where('created_at', '>=', $request->post('desde'))
            ->where('created_at', '>=', $request->post('hasta'))
            ->take(5)
            ->get();

        //la respuesta lo pasamos a un array
        $reporte = collect($reservas)->toArray();

        //dd($reporte);
        //creamos el pdf
        $pdfInstance = App::make('dompdf.wrapper');
        $pdf = $pdfInstance->loadView('export', ['ventas' => $reporte]);
        $pdfArchivo = $pdf->stream('pdfReporte.pdf');

        //creamos el excel
        $excel = (new ExcelExport($reporte))->raw('Xlsx');

        //enviamos el correo
        Mail::send([], [], function ($message) use ($pdfArchivo, $excel) {
            $message->to('alex@example.com')
                ->subject('Reporte de ventas')
                ->attachData($excel, 'VentasExcel.xlsx')
                ->attachData($pdfArchivo, 'Ventas.pdf')
                ->setBody('Adjunto reporte de ventas');
        });

        return response(['mensaje' => 'Enviado correctamente']);
    }
}
