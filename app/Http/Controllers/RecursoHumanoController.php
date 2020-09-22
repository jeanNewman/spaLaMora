<?php

namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecursoHumanoController extends Controller
{
    public function marcaciones(Request $request){

        if (!$request->ajax()) {
            return redirect('/');
        }

        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->format('Ymd'); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->format('Ymd'); // 2018-09-29 23:59:59

         $serie = $request->buscar;   
            $queryResult = DB::connection('sqlsrv')
            ->select("OWN_RPT_MARCACIONES ?, ?, ? ", [$fechaIni,$fechaFin,$serie]);

            $marcaciones = collect($queryResult);
            
            return ['marcaciones' => $marcaciones];

    }
}
