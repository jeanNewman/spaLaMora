<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YapeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cliente = $request->cliente;
        $nro_orden = $request->nro_orden;
        $email = $request->email;
        $datos = ['cliente' => $cliente, 'nro_orden' => $nro_orden, 'email' => $email];
        return view('yape')->with('datos',$datos);
    }
}
