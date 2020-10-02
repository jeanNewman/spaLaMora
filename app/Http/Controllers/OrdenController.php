<?php

namespace App\Http\Controllers;

use App\DetalleOrden;
use App\Notifications\NotifyAdmin;
use App\Orden;
use App\User;
use App\Persona;
use App\CodigoPostal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdenController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $buscar2 = $request->buscar2;
        $criterio2 = $request->criterio2;
        $buscar3 = $request->buscar3;
        $criterio3 = $request->criterio3;
        $tabla1 = 'ordenes.';
        $tabla2 = 'ordenes.';
        $tabla3 = 'ordenes.';



        if( $criterio === 'nombre' && $criterio2 === 'nombre' )
            { $tabla1 = 'personas.';
              $buscar2 = ''; }
        elseif ($criterio === 'nombre') {
             $tabla1 = 'personas.';}
        elseif ($criterio2 === 'nombre') {
            $tabla2 = 'personas.';
        }
        
        if( $criterio === 'usuario' && $criterio2 === 'usuario' )
            { $tabla1 = 'users.';
                $buscar2=''; }
        elseif ($criterio === 'usuario') {
             $tabla1 = 'users.';}
        elseif ($criterio2 === 'usuario') {
            $tabla2 = 'users.';
        }

        if ($buscar == '' && $buscar2 == '' && $buscar3 == '') {
            $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
                ->join('personas','ordenes.idcliente','=','personas.id')
                ->join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
                ->select(DB::raw('ordenes.id,ordenes.nombre_cliente,personas.nombre,personas.tipo_documento,personas.num_documento,
                     personas.direccion,personas.email, personas.telefono as telefonoCliente,ordenes.ruta as rutas,ordenes.telefono,' .
                    'ordenes.destino,ordenes.idShopify,ordenes.slot,ordenes.distrito,ordenes.deposito,ordenes.observacion,DATE_FORMAT(ordenes.fecha_entrega, "%Y-%m-%d") as fecha_entrega,' .
                    'ordenes.estado,users.usuario,ordenes.formaPago,ordenes.banco,ordenes.total,' .
                    'CONCAT("[",GROUP_CONCAT(CONCAT(' . "'" . '{"idarticulo":"' . "'," . 'detalle_ordenes.idarticulo' . 
                    ',' . "'" .'", "indice":' . "'," . 'detalle_ordenes.index' .
                    ',' . "'" . ', "articulo":"' . "'," . 'detalle_ordenes.articulo' .
                    ',' . "'" . '", "comentario":"' . "'," . 'coalesce(detalle_ordenes.observacion,"NA")' .
                    ',' . "'" .'", "precio":' . "'," . 'detalle_ordenes.precio' . 
                    ',' . "'" . ', "cantidad":' . "'," . 'detalle_ordenes.cantidad,' . "'" . '}' . "'" . ')),"]")  as items'))
                   
                    ->groupby('ordenes.id','ordenes.nombre_cliente', 'personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','ordenes.ruta', 'ordenes.telefono', 'ordenes.destino','ordenes.idShopify','ordenes.slot', 'ordenes.distrito',
                    'ordenes.deposito', 'ordenes.observacion', 'ordenes.fecha_entrega',
                    'ordenes.estado', 'users.usuario', 'ordenes.formaPago','ordenes.banco','ordenes.total')
                ->orderBy('ordenes.id', 'desc')->paginate(5);
        } else {
            $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
                ->join('personas','ordenes.idcliente','=','personas.id')
                ->join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
                ->select(DB::raw('ordenes.id,ordenes.nombre_cliente,personas.nombre,personas.tipo_documento,personas.num_documento,
        personas.direccion,personas.email,
         personas.telefono as telefonoCliente,ordenes.ruta as rutas,ordenes.telefono,' .
                    'ordenes.destino,ordenes.idShopify,ordenes.slot,ordenes.distrito,ordenes.deposito,ordenes.observacion,DATE_FORMAT(ordenes.fecha_entrega, "%Y-%m-%d") as fecha_entrega,' .
                    'ordenes.estado,users.usuario,ordenes.formaPago,ordenes.banco,ordenes.total,' .
                    'CONCAT("[",GROUP_CONCAT(CONCAT(' . "'" . '{"idarticulo":"' . "'," . 'detalle_ordenes.idarticulo' . 
                        ',' . "'" .'", "indice":' . "'," . 'detalle_ordenes.index' .
                        ',' . "'" . ', "articulo":"' . "'," . 'detalle_ordenes.articulo' .
                        ',' . "'" . '", "comentario":"' . "'," . 'coalesce(detalle_ordenes.observacion,"NA")' .
                        ',' . "'" .'", "precio":' . "'," . 'detalle_ordenes.precio' . 
                        ',' . "'" . ', "cantidad":' . "'," . 'detalle_ordenes.cantidad,' . "'" . '}' . "'" . ')),"]")  as items'))
                ->where($tabla1 . $criterio, 'like', '%' . $buscar . '%')
                ->where($tabla2 . $criterio2, 'like', '%' . $buscar2 . '%')
                ->where('ordenes.' . $criterio3, 'like', '%' . $buscar3 . '%')
                
                ->groupby('ordenes.id', 'ordenes.nombre_cliente','personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','ordenes.ruta', 'ordenes.telefono', 'ordenes.destino','ordenes.idShopify','ordenes.slot', 'ordenes.distrito',
                    'ordenes.deposito', 'ordenes.observacion', 'ordenes.fecha_entrega',
                    'ordenes.estado', 'users.usuario','ordenes.formaPago','ordenes.banco', 'ordenes.total')
                ->orderBy('ordenes.id', 'desc')->paginate(5);

        }
         $allRutas =Orden::select('ruta as allRuta')->groupby('ruta')->get();
        return [
            'pagination' => [
                'total' => $ordenes->total(),
                'current_page' => $ordenes->currentPage(),
                'per_page' => $ordenes->perPage(),
                'last_page' => $ordenes->lastPage(),
                'from' => $ordenes->firstItem(),
                'to' => $ordenes->lastItem(),
            ],
            'allRutas' => $allRutas,
            'ordenes' => $ordenes,

        ];
    }

    //para el reporte de los conductores
    public function obtenerCabecera(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
            $buscar = $request->buscar;
            $criterio = $request->criterio;    
        $id = $request->id;
        $tabla1 = 'ordenes.';
       



       
        if ($criterio === 'nombre') {
             $tabla1 = 'personas.';}
       
        
       
        if ($criterio === 'usuario') {
             $tabla1 = 'users.';}
       

        if($id!=''){
            $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
            ->join('personas','ordenes.idcliente','=','personas.id')
            ->select('ordenes.id', 'ordenes.nombre_cliente','personas.nombre','personas.tipo_documento','personas.num_documento',
                'personas.direccion','personas.email',
                'personas.telefono as telefonoCliente', 'ordenes.telefono', 'ordenes.destino','ordenes.idShopify','ordenes.slot', 'ordenes.distrito',
                'ordenes.deposito', 'ordenes.observacion', 'ordenes.fecha_entrega',
                'ordenes.estado', 'users.usuario', 'ordenes.total') 
            ->where('ordenes.id', '=', $id)
            ->orderBy('ordenes.id', 'desc')->take(1)->get();
        }else{
            $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
            ->join('personas','ordenes.idcliente','=','personas.id')
            ->select(DB::raw('users.usuario,ordenes.id,ordenes.ruta as rutas, personas.nombre,if(ordenes.destino is NULL,personas.direccion,ordenes.destino) as destino,
            ordenes.idShopify,ordenes.slot, ordenes.distrito, personas.telefono as telefonoCliente,ordenes.nombre_cliente,ordenes.telefono,ordenes.observacion' ))
            ->where($tabla1 . $criterio, 'like', '%' . $buscar . '%')
            ->where('ordenes.estado','=','Registrado')
            ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
            ->orderBy('ordenes.id', 'desc')->paginate(1000);
        }
      
        if($id!=''){
            return ['ordenes' => $ordenes];
        }else{
        return [
            'pagination' => [
                'total' => $ordenes->total(),
                'current_page' => $ordenes->currentPage(),
                'per_page' => $ordenes->perPage(),
                'last_page' => $ordenes->lastPage(),
                'from' => $ordenes->firstItem(),
                'to' => $ordenes->lastItem(),
            ],
            'ordenes' => $ordenes,

        ];
    }
    }
    
    public function obtenerPagos(Request $request){
        if (!$request->ajax()) {
            return redirect('/');
        }

        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
            $tabla = 'ordenes.';
            $buscar = $request->buscar;
            $criterio = $request->criterio;    
            if ($criterio === 'nombre') {
                $tabla = 'personas.';}
        

        $ordenes = Orden::join('personas','ordenes.idcliente','=','personas.id')
            ->select(DB::raw('ordenes.id, personas.nombre,personas.num_documento,ordenes.formaPago,ordenes.banco,ordenes.deposito' ))
            ->where($tabla . $criterio, 'like', '%' . $buscar . '%')
            ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
            ->orderBy('ordenes.id', 'desc')->get();
            
            return ['ordenes' => $ordenes];
    }
    
    public function obtenerComentario(Request $request){
        if (!$request->ajax()) {
            return redirect('/');
        }

        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
            $tabla = 'ordenes.';
            $buscar = $request->buscar;
            $criterio = $request->criterio;    
            if ($criterio === 'usuario') {
                $tabla = 'users.';}
        

        $ordenes = Orden::join('users','ordenes.idusuario','=','users.id')
            ->join('detalle_ordenes','ordenes.id','=','detalle_ordenes.idordenes')
            ->select(DB::raw('ordenes.id, users.usuario,detalle_ordenes.articulo,detalle_ordenes.observacion' ))
            ->where($tabla . $criterio, 'like', '%' . $buscar . '%')
            ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
            ->where('detalle_ordenes.observacion','!=','Modificador')
            ->where('detalle_ordenes.observacion','!=','NA')
            ->orderBy('ordenes.id', 'desc')->get();
            
            return ['ordenes' => $ordenes];
    }
    
    public function obtenerDetalles(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $id = $request->id;
        $detalles = DetalleOrden::select('detalle_ordenes.idarticulo', 'detalle_ordenes.index','detalle_ordenes.articulo',
            'detalle_ordenes.cantidad', 'detalle_ordenes.precio', 'detalle_ordenes.medida')
            ->where('detalle_ordenes.idordenes', '=', $id)
            ->orderBy('detalle_ordenes.id', 'desc')->get();
        //dd($detalles->toSql());
        return ['detalles' => $detalles];
    }
    ////////////////////////////////////////////////
    public function obtenerCabeceraAll(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
            'creacion' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
          
        $fechaCreacion = Carbon::parse($request->creacion)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateString(); // 2018-09-29 23:59:59
        $buscar = $request->buscar;
        $criterio = $request->criterio;  
        $criterio2 = $request->criterio2;  
        $tabla1 = 'ordenes.';
        if ($criterio === 'nombre') {
             $tabla1 = 'personas.';}
        if ($criterio === 'usuario') {
             $tabla1 = 'users.';}
             
      //       DB::enableQueryLog();
        $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
            ->join('personas','ordenes.idcliente','=','personas.id')
            ->join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
            ->select(DB::raw('ordenes.id,DATE_FORMAT(ordenes.fecha_entrega, "%Y-%m-%d") as fecha_entrega, ordenes.ruta as rutas,ordenes.distrito,personas.nombre,'.
            'personas.tipo_documento,personas.num_documento,personas.direccion,personas.email,personas.telefono as telefonoCliente,'.
            'ordenes.nombre_cliente,ordenes.telefono,ordenes.destino, ,ordenes.idShopify,ordenes.slot,ordenes.deposito,ordenes.observacion,ordenes.created_at,' .
            'ordenes.estado,users.usuario,ordenes.formaPago,ordenes.banco,ordenes.total,' .
                'CONCAT("[",GROUP_CONCAT(CONCAT(' . "'" . '{"idarticulo":"' . "'," . 'detalle_ordenes.idarticulo' . 
                    ',' . "'" .'", "indice":' . "'," . 'detalle_ordenes.index' .
                    ',' . "'" . ', "articulo":"' . "'," . 'detalle_ordenes.articulo' .
                    ',' . "'" . '", "comentario":"' . "'," . 'coalesce(detalle_ordenes.observacion,"NA")' .
                    ',' . "'" .'", "precio":' . "'," . 'detalle_ordenes.precio' . 
                    ',' . "'" . ', "cantidad":' . "'," . 'detalle_ordenes.cantidad,' . "'" . '}' . "'" . ')),"]")  as items'))
            ->where($tabla1 . $criterio, 'like', '%' . $buscar . '%')
            ->where('ordenes.estado','=','Registrado')
            ->where('ordenes.created_at',$criterio2,$fechaCreacion)
            ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
           
            ->groupby('ordenes.id','ordenes.nombre_cliente', 'personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','ordenes.ruta', 'ordenes.telefono', 'ordenes.destino','ordenes.idShopify','ordenes.slot', 'ordenes.distrito',
                'ordenes.deposito', 'ordenes.observacion', 'ordenes.created_at','ordenes.fecha_entrega',
                'ordenes.estado', 'users.usuario','ordenes.formaPago','ordenes.banco', 'ordenes.total')
            ->orderBy('ordenes.id', 'ordenes.ruta','desc')->paginate(1000);

        //   dd($ordenes->toSql());
        //dd($ordenes->toSql());
        
        return [
            'pagination' => [
                'total' => $ordenes->total(),
                'current_page' => $ordenes->currentPage(),
                'per_page' => $ordenes->perPage(),
                'last_page' => $ordenes->lastPage(),
                'from' => $ordenes->firstItem(),
                'to' => $ordenes->lastItem(),
            ],
            'ordenes' => $ordenes,

        ];
    }
   
    /////////////////////////////////////////////////////
    


    public function pdfAll(Request $request)
    {
        
        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
            'creacion' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59

        $fechaCreacion = Carbon::parse($request->creacion)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateString(); // 2018-09-29 23:59:59

        $buscar = $request->buscar;
        $criterio = $request->criterio;  
        $criterio2 = $request->criterio2;  

        if($request->tipo ==1 )
         {
            $tipo="pdf.despacho";
            $nombrePdf = "DespachoPdf-". Carbon::parse($request->fechaini)->format('Y-m-d').".pdf";
         } else{
            $tipo="pdf.cajera";
            $nombrePdf = "CajeraPdf-". Carbon::parse($request->fechaini)->format('Y-m-d').".pdf";
         }  
        $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
                ->join('personas','ordenes.idcliente','=','personas.id')
                ->join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
                ->select(DB::raw('ordenes.id,ordenes.nombre_cliente,personas.nombre,personas.tipo_documento,personas.num_documento,
        if(ordenes.destino is NULL,personas.direccion,ordenes.destino) destino,personas.email,
         personas.telefono as telefonoCliente,ordenes.ruta as rutas,ordenes.telefono,ordenes.created_at,' .
         'ordenes.idShopify,ordenes.slot,ordenes.distrito,ordenes.deposito,ordenes.observacion,DATE_FORMAT(ordenes.fecha_entrega, "%Y-%m-%d") as fecha_entrega,' .
                    'ordenes.estado,users.usuario,ordenes.formaPago,ordenes.banco,ordenes.total,' .
                    'CONCAT("[",GROUP_CONCAT(CONCAT(' . "'" . '{"idarticulo":"' . "'," . 'detalle_ordenes.idarticulo' . 
                        ',' . "'" .'", "indice":' . "'," . 'detalle_ordenes.index' .
                        ',' . "'" . ', "articulo":"' . "'," . 'detalle_ordenes.articulo' .
                        ',' . "'" . '", "comentario":"' . "'," . 'coalesce(detalle_ordenes.observacion,"NA")' .
                        ',' . "'" .'", "precio":' . "'," . 'detalle_ordenes.precio' . 
                        ',' . "'" . ', "cantidad":' . "'," . 'detalle_ordenes.cantidad,' . "'" . '}' . "'" . ')),"]")  as items'))
                ->where('ordenes.estado','=','Registrado')   
                ->where('ordenes.created_at',$criterio2,$fechaCreacion)     
                ->where('ordenes.' . $criterio, 'like', '%' . $buscar . '%')
                ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
                
                ->groupby('ordenes.id','ordenes.nombre_cliente', 'personas.nombre','personas.tipo_documento','personas.num_documento',
                    'personas.direccion','personas.email','personas.telefono','ordenes.ruta', 'ordenes.telefono', 'ordenes.destino','ordenes.idShopify','ordenes.slot', 
                    'ordenes.distrito','ordenes.deposito', 'ordenes.observacion','ordenes.created_at', 'ordenes.fecha_entrega',
                    'ordenes.estado', 'users.usuario','ordenes.formaPago','ordenes.banco', 'ordenes.total')
                ->orderBy('ordenes.id', 'desc')->get();

       
        $pdf = \PDF::loadView($tipo, ['orden' => $ordenes])
                     ->setPaper('a4', 'portrait');
                     return $pdf->stream(
                        $nombrePdf,
                        array(
                          'Attachment' => 0
                        )
                      );
    }
    
    public function pdf(Request $request, $id)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
       
        $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
            ->join('personas','ordenes.idcliente','=','personas.id')
            ->select('ordenes.id','ordenes.nombre_cliente', 'personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono as telefonoCliente', 'ordenes.telefono', 'ordenes.destino', 'ordenes.distrito',
                'ordenes.deposito', 'ordenes.observacion', 'ordenes.fecha_entrega',
                'ordenes.estado', 'users.usuario', 'ordenes.total')
            ->where('ordenes.id', '=', $id)
            ->orderBy('ordenes.ruta', 'ordenes.id', 'desc')->take(1)->get();

        $detalles = DetalleOrden::select('detalle_ordenes.idarticulo', 'detalle_ordenes.articulo',
            'detalle_ordenes.cantidad', 'detalle_ordenes.precio', 'detalle_ordenes.medida')
            ->where('detalle_ordenes.idordenes', '=', $id)
            ->orderBy('detalle_ordenes.id', 'desc')->get();

       
       
        $pdf = \PDF::loadView('pdf.orden', ['venta' => $ordenes, 'detalles' => $detalles]);
        return $pdf->stream(
            'file.pdf',
            array(
              'Attachment' => 0
            )
          );
    }

    public function consolidadoArticulo(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $rutas = explode(",",$request->rutas);
           
        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
        
        $horaIni = Carbon::parse($request->horaini)
            ->toDateTimeString(); // 2018-09-29 23:59:
       
        $horaFin = Carbon::parse($request->horafin)
           ->toDateTimeString(); // 2018-09-29 23:59:59
       
        $criterio2 = $request->criterio2;
        if ($buscar==""){
         //   DB::enableQueryLog(); // Enable query log

        $ordenes = Orden::join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
            ->select(DB::raw('detalle_ordenes.idarticulo,detalle_ordenes.articulo,sum(detalle_ordenes.cantidad) cantidad'))
            ->where('ordenes.estado','=','Registrado')
            ->where('ordenes.distrito','!=','RECOGER EN GALVEZ')
            ->where('ordenes.distrito','!=','RECOGER EN SURCO')            
            ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
            ->whereBetween('ordenes.created_at', [$horaIni, $horaFin])      
            ->whereIn('ordenes.ruta',$rutas)      
            ->groupby('detalle_ordenes.idarticulo', 'detalle_ordenes.articulo')
            ->orderBy('detalle_ordenes.articulo', 'desc')->get();
        }else{
            $ordenes = Orden::join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
            ->select(DB::raw('detalle_ordenes.idarticulo,detalle_ordenes.articulo,sum(detalle_ordenes.cantidad) cantidad'))
            ->where('ordenes.estado','=','Registrado')
            ->where('ordenes.' . $criterio, 'like', '%' . $buscar . '%')
            ->whereIn('ordenes.ruta',$rutas)
            ->whereBetween('ordenes.fecha_entrega', [$fechaIni, $fechaFin])
            ->whereBetween('ordenes.created_at', [$horaIni, $horaFin])            
            ->groupby('detalle_ordenes.idarticulo', 'detalle_ordenes.articulo')
            ->orderBy('detalle_ordenes.articulo', 'desc')->get();
        }
         //dd($horaIni);
      //   dd(DB::getQueryLog());
        return [
            
            'ordenes' => $ordenes,

        ];
    }

    public function consolidadoArticuloReceta(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
        
        $horaIni = Carbon::parse($request->horaini)
            ->toDateTimeString(); // 2018-09-29 23:59:
       
        $horaFin = Carbon::parse($request->horafin)
           ->toDateTimeString(); // 2018-09-29 23:59:59
       
       

        $queryResult = DB::connection('sqlsrv')
            ->select("OWN_RPT_CONSOLIDADO_ART_RECETA ?, ? ", [$fechaIni,$fechaFin]);

            $consolidado = collect($queryResult);
            
            return ['consolidadoReceta' => $consolidado];
    }

    public function reportRutas(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $request->validate([

            'fechaini' => 'required|date',
            'fechafin' => 'required|date',
        ]);

        $fechaIni = Carbon::parse($request->fechaini)
            ->startOfDay() // 2018-09-29 00:00:00.000000
            ->toDateTimeString(); // 2018-09-29 00:00:00

        $fechaFin = Carbon::parse($request->fechafin)
            ->endOfDay() // 2018-09-29 23:59:59.000000
            ->toDateTimeString(); // 2018-09-29 23:59:59
        $buscar = $request->buscar;
        $criterio = $request->criterio;    

        $ordenes = Orden::join('users', 'ordenes.idusuario', '=', 'users.id')
            ->join('personas','ordenes.idcliente','=','personas.id')
            ->join('detalle_ordenes', 'ordenes.id', '=', 'detalle_ordenes.idordenes')
            ->select(DB::raw('ordenes.id,ordenes.nombre_cliente,personas.nombre,personas.tipo_documento,personas.num_documento,
        personas.direccion,personas.email,
         personas.telefono as telefonoCliente,ordenes.ruta as rutas,ordenes.telefono,' .
                'ordenes.destino Direccion_entrega,ordenes.distrito,ordenes.idShopify,ordenes.slot,ordenes.deposito,ordenes.observacion,DATE_FORMAT(ordenes.fecha_entrega, "%Y-%m-%d") as fecha_entrega,' .
                'ordenes.estado,users.usuario,ordenes.formaPago,ordenes.banco,ordenes.total,' .
                'CONCAT("[",GROUP_CONCAT(CONCAT(' . "'" . '{"idarticulo":"' . "'," . 'detalle_ordenes.idarticulo' . 
                    ',' . "'" .'", "indice":' . "'," . 'detalle_ordenes.index' .
                    ',' . "'" . ', "articulo":"' . "'," . 'detalle_ordenes.articulo' .
                    ',' . "'" . '", "comentario":"' . "'," . 'coalesce(detalle_ordenes.observacion,"NA")' .
                    ',' . "'" .'", "precio":' . "'," . 'detalle_ordenes.precio' . 
                    ',' . "'" . ', "cantidad":' . "'," . 'detalle_ordenes.cantidad,' . "'" . '}' . "'" . ')),"]")  as items'))
            ->where('ordenes.' . $criterio, 'like', '%' . $buscar . '%')
           
            ->groupby('ordenes.id','ordenes.nombre_cliente', 'personas.nombre','personas.tipo_documento','personas.num_documento',
        'personas.direccion','personas.email',
        'personas.telefono','ordenes.ruta', 'ordenes.telefono', 'ordenes.destino','ordenes.idShopify','ordenes.slot', 'ordenes.distrito',
                'ordenes.deposito', 'ordenes.observacion', 'ordenes.fecha_entrega',
                'ordenes.estado', 'users.usuario','ordenes.formaPago','ordenes.banco', 'ordenes.total')
            ->orderBy('ordenes.id', 'ordenes.ruta','desc')->paginate(5);

        //   dd($ordenes->toSql());
        //dd($ordenes->toSql());
        return [
            'pagination' => [
                'total' => $ordenes->total(),
                'current_page' => $ordenes->currentPage(),
                'per_page' => $ordenes->perPage(),
                'last_page' => $ordenes->lastPage(),
                'from' => $ordenes->firstItem(),
                'to' => $ordenes->lastItem(),
            ],
            'ordenes' => $ordenes,

        ];
    }
   
    function validar_fecha_espanol($fecha){
        $valores = explode('/', $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
            return true;
        }
        return false;
    }

    public function store(Request $request)
    {

       

        if (!$request->ajax()) {
            return redirect('/');
        }
        $fechaFin = OrdenController::validar_fecha_espanol($request->fecha_entrega)?Carbon::createFromFormat('d/m/Y', $request->fecha_entrega)->format('Y-m-d'):Carbon::parse($request->fecha_entrega)
        ->endOfDay() // 2018-09-29 23:59:59.000000
        ->toDateTimeString(); // 2018-09-29 23:59:59
        $distrito = $request->distrito;
        $formaPago = $request->formaPago;
        $tipo = false;
        $existe = $request->existe;
        $success = 'false';
        $postalFac = '';
        $observacion = $request->observacion;

        if($existe === 1){
            $success = Orden::where('idShopify','=',$request->idShopify)->count() > 0? 'true':'false';
                 
        }
       
        
       if($success === 'false'){
           
            try {
                DB::beginTransaction();
                $findTipo = $request->data; //Array de detalles
                foreach ($findTipo as $fp => $find) {
                    if ($find['tipo'] == "TORTA") {
                        $tipo = true;
                        break;
                    }
                }
                $mytime = Carbon::now('America/Lima');

                $ordenes = new Orden();
                $ordenes->idcliente =$request->idCliente;// $idCliente;
                $ordenes->idusuario = \Auth::user()->id;
                $ordenes->nombre_cliente = $request->nombre_cliente;
                $ordenes->telefono = $request->telefono;
                if ($tipo == true) {
                    if (($distrito == 'SAN ISIDRO' || $distrito == 'BARRANCO' || $distrito == 'MIRAFLORES' || 
                        $distrito == 'MAGDALENA' ||  $distrito == 'LINCE' || $distrito == 'CHORRILLOS' ||
                        $distrito == 'JESUS MARIA' || $distrito == 'SAN MIGUEL' || $distrito == 'PUEBLO LIBRE')) {
                        $ordenes->ruta = 'RUTA-10';
                    } else {
                        $ordenes->ruta = 'RUTA-20';
                    }
                } elseif ($tipo == false) {
                    if (($distrito == 'SAN ISIDRO' || $distrito == 'BARRANCO' || $distrito == 'MIRAFLORES' || 
                        $distrito == 'MAGDALENA' ||  $distrito == 'LINCE' || $distrito == 'CHORRILLOS' ||
                        $distrito == 'JESUS MARIA'  || $distrito == 'PUEBLO LIBRE')) {
                        $ordenes->ruta = 'RUTA-30';
                    } else {
                        $ordenes->ruta = 'RUTA-40';
                    }
                }
                if($distrito=='LA MOLINA' || $distrito == 'LA VICTORIA')
                $ordenes->ruta = 'RUTA-60';

                if($distrito == 'COMAS' || $distrito == 'INDEPENDENCIA' || $distrito == 'SMP' || $distrito == 'LOS OLIVOS')
                $ordenes->ruta = 'RUTA-50';

                if($distrito=='BREÑA' || $distrito == 'RIMAC' ||  $distrito == 'SJL')
                $ordenes->ruta = 'RUTA-50';

                
                if($distrito == "RECOGER SAN ISIDRO" || $distrito == "RECOGER EN GALVEZ" || $distrito == "RECOGER EN SURCO"  )
                $ordenes->ruta = 'NA';
                if($formaPago==='Juntos'){
                    $ordenes->ruta = 'JUNTOS' ;                                   
                }
                
                $ordenes->destino = $request->destino;
                $ordenes->idShopify = $request->idShopify;
                $ordenes->distrito = $distrito;
                $ordenes->deposito = $request->deposito;
                $ordenes->total = $request->total;
                $ordenes->observacion = $observacion;
                $ordenes->fecha_entrega = $fechaFin;
                $ordenes->formaPago = $request->formaPago;
                $ordenes->banco = $request->banco;
                $ordenes->estado = 'Registrado';
               
                $ordenes->save();

                $detalles = $request->data; //Array de detalles
                //Recorro todos los elementos
                //dd($request->data);
                foreach ($detalles as $ep => $det) {
                    $detalle = new DetalleOrden();
                    $detalle->idordenes = $ordenes->id;
                    $detalle->index = $ep+1;
                    $detalle->idarticulo = $det['idarticulo'];
                    $detalle->articulo = $det['articulo'];
                    $detalle->cantidad = $det['cantidad'];
                    $detalle->precio = $det['precio'];
                    $detalle->medida = $det['medida'];
                    $detalle->observacion = $det['comentario'];
                    $detalle->adicional = $det['adicional'];

                    $detalle->save();
                }

                $fechaActual = date('Y-m-d');
                $numOrdenes = DB::table('ordenes')->whereDate('created_at', $fechaActual)->count();
                $numIngresos = DB::table('ingresos')->whereDate('created_at', $fechaActual)->count();

                $arregloDatos = [
                    'ordenes' => [
                        'numero' => $numOrdenes,
                        'msj' => 'Ventas',
                    ],
                    'ingresos' => [
                        'numero' => $numIngresos,
                        'msj' => 'Ingresos',
                    ],
                ];
                $allUsers = User::all();

                foreach ($allUsers as $notificar) {
                    User::findOrFail($notificar->id)->notify(new NotifyAdmin($arregloDatos));
                }

                DB::commit();
                return [
                    'id' => $ordenes->id,
                ];
            } catch (Exception $e) {
                
                DB::rollBack();
            }
        }
    }


  

    public function obtenerRutas(){
        $allRutas =Orden::select('ruta as allRuta')->groupby('ruta')->get();
        return ['allRutas' => $allRutas];
    }

    public function cambiarruta(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
        $rutaid = "RUTA-".$request->ruta;
        $orden = Orden::findOrFail($request->id);
        $orden->ruta = $rutaid;
        $orden->save();
    }

    public function cortesia(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
        $id=$request->id;
        $idArt=$request->idart;
        $resta = $request->resta;
        
        //DB::update('update detalle_ordenes set precio = ?,observacion = ? where idordenes = ? and idarticulo = ?',[0,'CORTESIA',$id,$idArt]);
        $detalle = DetalleOrden::where('idordenes','=',$id)
        ->where('idarticulo','=',$idArt)->first();
        
        $detalle->precio = 0;
        $detalle->observacion = 'CORTESIA';
        $detalle->save();

        $valor = Orden::where('id','=',$id)->first();
        
        $orden = Orden::findOrFail($request->id);
        $orden->total = floatval($valor->total)-$resta;
        
        $orden->save();
    }

    

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $orden = Orden::findOrFail($request->id);
        $orden->estado = 'Anulado';
        $orden->save();
    }
}
