<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Persona;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $personas = Persona::orderBy('id', 'desc')->paginate(3);
        }
        else{
            $personas = Persona::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(3);
        }
        
        $excel = Persona::where($criterio, 'like', '%'. $buscar . '%')
        ->select("nombre as Cliente",DB::raw("coalesce (email,'NA') as Email"))
        ->orderBy('id', 'desc')->get();
        return [
            'pagination' => [
                'total'        => $personas->total(),
                'current_page' => $personas->currentPage(),
                'per_page'     => $personas->perPage(),
                'last_page'    => $personas->lastPage(),
                'from'         => $personas->firstItem(),
                'to'           => $personas->lastItem(),
            ],
            'personas' => $personas,
            'excel' => $excel
        ];
    }

    public function selectCliente(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $clientes = Persona::where('nombre', 'like', '%'. $filtro . '%')
        ->orWhere('num_documento', 'like', '%'. $filtro . '%')
        ->orderBy('nombre', 'asc')->get();
        
        return ['clientes' => $clientes];
    }

   public function getClienteId(Request $request){
       if (!$request->ajax()) return redirect('/');
       DB::enableQueryLog();
       if( Persona::where('nombre', '=',strtoupper($request->nombre) )->where('num_documento', '=', $request->num_documento)->exists()){ 
               if(strtoupper($request->nombre) === "JUAN PEREZ") dd(DB::getQueryLog());;
        $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre) )->where('num_documento', '=', $request->num_documento)->first();
        return[ 'last_insert_id' =>  $persona->id];

        }elseif( Persona::where('nombre', '=',strtoupper($request->nombre) )->where('email', '=', $request->email)->exists()){  
            if(strtoupper($request->nombre) === "JUAN PEREZ") dd(DB::getQueryLog());;   
            $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre) ) ->where('email', '=', $request->email)->first();  
            return['last_insert_id' => $persona->id];

        }elseif( Persona::where('nombre', '=',strtoupper($request->nombre))->where('telefono', '=', $request->telefono)->exists()){  
            if(strtoupper($request->nombre) === "JUAN PEREZ") dd(DB::getQueryLog());;  
            $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre))->where('telefono', '=', $request->telefono)->first();       
            return['last_insert_id' => $persona->id];
        }elseif( Persona::where('nombre', '=',strtoupper($request->nombre))->whereDate('created_at', DB::raw('CURDATE()'))->count()>0){  
            if(strtoupper($request->nombre) === "JUAN PEREZ") dd(DB::getQueryLog());;  
            $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre))->whereDate('created_at', DB::raw('CURDATE()'))->first();       
            return['last_insert_id' => $persona->id];
        }else return['last_insert_id' => 0];

      
   }

    public function store(Request $request)
    {
        
        if (!$request->ajax()) return redirect('/');
        try {
            DB::beginTransaction();
            if( Persona::where('nombre', '=',strtoupper($request->nombre) )->where('num_documento', '=', $request->num_documento)->exists()){ 
                
                $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre) )->where('num_documento', '=', $request->num_documento)->first();
                return['errorValid' => ['El Cliente '.$request->nombre.' con el Documento: '. $request->num_documento.' ya existe']
                          ,'last_insert_id' => $persona->id];
        
                }elseif( Persona::where('nombre', '=',strtoupper($request->nombre) )->where('email', '=', $request->email)->exists()){  
                            
                    $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre) ) ->where('email', '=', $request->email)->first();  
                    return['errorValid' => ['El Cliente '.$request->nombre.' con el Correo: '. $request->num_documento.' ya existe']
                          ,'last_insert_id' => $persona->id];
        
                }elseif( Persona::where('nombre', '=',strtoupper($request->nombre))->where('telefono', '=', $request->telefono)->exists()){  
                            
                    $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre))->where('telefono', '=', $request->telefono)->first();       
                    return['errorValid' => ['El Cliente '.$request->nombre.' con el Telefono: '. $request->telefono.' ya existe']
                          ,'last_insert_id' => $persona->id];
                }elseif( Persona::where('nombre', '=',strtoupper($request->nombre))->whereDate('created_at', DB::raw('CURDATE()'))->count()>0){  
                            
                    $persona=Persona::select('id')->where('nombre', '=',strtoupper($request->nombre))->whereDate('created_at', DB::raw('CURDATE()'))->first();       
                    return['errorValid' => ['El Cliente '.$request->nombre.' creado hoy: '. DB::raw('CURDATE()').' ya existe']
                          ,'last_insert_id' => $persona->id];
                }
               
       
        else{
        $persona = new Persona();
        $persona->nombre = strtoupper($request->nombre);
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento = $request->num_documento;
        $persona->id_juntos = $request->id_juntos;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;

        $persona->save();
       
        
        }
        DB::commit();
        return [
            'last_insert_id' => $persona->id
        ];
    } catch (Exception $e) {
        DB::rollBack();
    }
        
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $persona = Persona::findOrFail($request->id);
        $persona->nombre = strtoupper($request->nombre);
        $persona->tipo_documento = $request->tipo_documento;
        $persona->num_documento = $request->num_documento;
        $persona->id_juntos = $request->id_juntos;
        $persona->direccion = $request->direccion;
        $persona->telefono = $request->telefono;
        $persona->email = $request->email;
        $persona->save();
    }
}
