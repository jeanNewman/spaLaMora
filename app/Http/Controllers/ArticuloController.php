<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\ArticuloSql;
use DB;

class ArticuloController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->orderBy('articulos.id', 'desc')->paginate(3);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('articulos.id', 'desc')->paginate(3);
        }
        

        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];
    }

    public function listarArticulo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }
 
    public function listarArticuloVenta(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }

    public function listarArticuloPedido(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $someModel = new ArticuloSql;
        $composicion = 'sistema';
        if($request->todos=='true'){
         $composicion = '';
        }
        $someModel->setConnection('sqlsrv');
        
        if ($buscar==''){
            $articulos = DB::connection('sqlsrv')->table('articulos as a')
            ->join('preciosventa as p', 'a.codarticulo', '=', 'p.codarticulo')
            ->leftjoin('formatos as f','p.codformato','=','f.codformato')
            ->select(DB::raw("a.codarticulo as codigo,
                              concat(a.descripcion, ' ',case when p.codformato != 0 then f.descripcion else '' end) as nombre,
                              case when p.pneto2 != 0 then p.pneto2 else p.pneto end as precio,
                              a.unidadmedida as medida,a.norma as tipo"))
            ->where('a.dpto','=','1')
            ->where('p.idtarifav','=','1')
            ->where('a.descatalogado','=','F')
            ->paginate(5);
        }
        else{
                  
            $articulos = DB::connection('sqlsrv')->table('articulos as a')
            ->join('preciosventa as p', 'a.codarticulo', '=', 'p.codarticulo')
            ->leftjoin('formatos as f','p.codformato','=','f.codformato')
            ->select(DB::raw("a.codarticulo as codigo,
                              concat(a.descripcion, ' ',case when p.codformato != 0 then f.descripcion else '' end) as nombre,
                              case when p.pneto2 != 0 then p.pneto2 else p.pneto end as precio,
                              a.unidadmedida as medida,a.norma as tipo"))
            ->where('a.dpto','=','1')
            ->where('p.idtarifav','=','1')
            ->where('a.descatalogado','=','F')
            ->where('a.composicion' , 'like', '%' . $composicion . '%')
            ->where(strtoupper('a.'.$criterio), 'like', '%'. strtoupper($buscar) . '%')
            ->paginate(5); 
               
        }
      //  dd($composicion);
    
    // dd($articulos->tosql());
        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];
    }

    public function mostrarDepartamento(){
       
        
        $dpto = DB::connection('sqlsrv')->table('departamento as d')
        ->select(DB::raw("d.numdpto nro_dpto, d.descripcion nombre_dpto"))->get();
        return ['dpto' => $dpto];
        
    }

    public function mostrarSeccion(Request $request){
       
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $seccion = DB::connection('sqlsrv')->table('secciones as s')
        ->select(DB::raw("s.numdpto nro_dpto_seccion,s.numseccion nro_seccion, s.descripcion nombre_seccion"))
        ->where('s.numdpto','=',$buscar)->get();
        return ['seccion' =>$seccion];
    
}

    public function listarPdf(){
        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->select('articulos.id','articulos.idcategoria','articulos.codigo','articulos.nombre',
            'categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock',
            'articulos.descripcion','articulos.condicion')
            ->orderBy('articulos.nombre', 'desc')->get();

        $cont=Articulo::count();

        $pdf = \PDF::loadView('pdf.articulospdf',['articulos'=>$articulos,'cont'=>$cont]);
        return $pdf->download('articulos.pdf');
    }

    public function buscarArticulo(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre')->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }

    public function buscarArticuloVenta(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id','nombre','stock','precio_venta')
        ->where('stock','>','0')
        ->orderBy('nombre', 'asc')
        ->take(1)->get();

        return ['articulos' => $articulos];
    }

    public function buscarArticuloPedido(Request $request){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = DB::connection('sqlsrv')->table('articulos as a')
        ->join('preciosventa as p', 'a.codarticulo', '=', 'p.codarticulo')
        ->select(DB::raw('a.codarticulo as codigo,a.descripcion as nombre,case when p.pneto2 != 0 then p.pneto2 else p.pneto end as precio,'.
                             'a.unidadmedida as medida,a.norma as tipo'))
        ->where('a.dpto','=','1')
        ->where('p.idtarifav','=','1')
        ->where('a.descatalogado','=','F')
        ->where('a.codarticulo','=', $filtro)
        ->where('a.composicion', '=','sistema')
        ->orderBy('a.descripcion', 'asc')
        ->take(1)->get();
        //dd($articulos->toSql());
        return ['articulos' => $articulos];
    }

    public function mostrarArticuloReceta(Request $request){
        
        if (!$request->ajax()) return redirect('/');
        $dpto = $request->dpto;
        $seccion = $request->seccion;

        $articulo = DB::connection('sqlsrv')
        ->select(DB::raw("SELECT S.NUMSECCION, S.DESCRIPCION SECCION,A.CODARTICULO, A.DESCRIPCION ITEM, A.UNIDADMEDIDA MEDIDA,
        COSTOSINIGV =
        (CASE A.ESKIT
        WHEN 'F' THEN AL.ULTIMOCOSTE*(CASE WHEN PV.CODFORMATO=0 THEN 1 ELSE F.DOSIS1/(CASE WHEN COALESCE(A.UDSELABORACION,0)=0 THEN 1 ELSE A.UDSELABORACION END) END)
         ELSE (CASE WHEN PV.CODFORMATO=0 THEN 1 ELSE F.DOSIS1/(CASE WHEN COALESCE(A.UDSELABORACION,0)=0 THEN 1 ELSE A.UDSELABORACION END) END) * BD1.DBO.CALCOSTEKITSINIVA
       (PV.CODARTICULO,PV.TALLA,PV.COLOR,'','ULTIMOCOSTE',PV.CODMONEDA,1,'F','F','F') END),
       
       CASE WHEN :dpto1 = 1 THEN ( PV.PNETO / 1.18) ELSE 0 END  VALORVENTA,
       
       CASE WHEN :dpto2 = 1 THEN  CONCAT (CASE WHEN (PV.PNETO * 1.18) > 0 THEN  CAST( 100- ((((PV.PNETO * 1.18)-(CASE A.ESKIT
        WHEN 'F' THEN AL.ULTIMOCOSTE*(CASE WHEN PV.CODFORMATO=0 THEN 1 ELSE F.DOSIS1/(CASE WHEN COALESCE(A.UDSELABORACION,0)=0 THEN 1 ELSE A.UDSELABORACION END) END)
         ELSE (CASE WHEN PV.CODFORMATO=0 THEN 1 ELSE F.DOSIS1/(CASE WHEN COALESCE(A.UDSELABORACION,0)=0 THEN 1 ELSE A.UDSELABORACION END) END) *
          BD1.DBO.CALCOSTEKITSINIVA(PV.CODARTICULO,PV.TALLA,PV.COLOR,'','ULTIMOCOSTE',PV.CODMONEDA,1,'F','F','F') END))/(PV.PNETO * 1.18))*100) AS VARCHAR)  ELSE PV.PNETO END,'%') ELSE 'NO APLICA %'  END MARGEN ,
        
       CASE WHEN :dpto3 = 1 THEN 
       
       (PV.PNETO / 1.18) -  (CASE A.ESKIT
        WHEN 'F' THEN AL.ULTIMOCOSTE*(CASE WHEN PV.CODFORMATO=0 THEN 1 ELSE F.DOSIS1/(CASE WHEN COALESCE(A.UDSELABORACION,0)=0 THEN 1 ELSE A.UDSELABORACION END) END)
         ELSE (CASE WHEN PV.CODFORMATO=0 THEN 1 ELSE F.DOSIS1/(CASE WHEN COALESCE(A.UDSELABORACION,0)=0 THEN 1 ELSE A.UDSELABORACION END) END) *
          BD1.DBO.CALCOSTEKITSINIVA(PV.CODARTICULO,PV.TALLA,PV.COLOR,'','ULTIMOCOSTE',PV.CODMONEDA,1,'F','F','F') END) ELSE 0 END BENEFICIO
       
       
       FROM ARTICULOS A LEFT JOIN ARTICULOSLIN AL ON A.CODARTICULO = AL.CODARTICULO
       LEFT JOIN PRECIOSVENTA PV ON PV.CODARTICULO = A.CODARTICULO
       LEFT JOIN FORMATOS F ON PV.CODFORMATO = F.CODFORMATO
       LEFT JOIN ARTICULOSREST AR ON A.CODARTICULO = AR.CODARTICULO
      
       INNER JOIN SECCIONES S ON A.SECCION = S.NUMSECCION 
       
       WHERE A.DESCATALOGADO = 'F' AND A.DPTO = :dpto4   AND (a.seccion =:seccion OR A.SECCION = 0)   AND (PV.IDTARIFAV IS NULL OR
       PV.IDTARIFAV LIKE
         CASE WHEN A.DPTO = 1 THEN 
           1
         ELSE
           2
         END)
       ORDER BY 2
       "), array(
                    
                    'dpto1' => $dpto,
                    'dpto2' => $dpto,
                    'dpto3' => $dpto,
                    'dpto4' => $dpto,
                    'seccion' => $seccion));

                    return ['articulo' => $articulo];
    }

    public function mostrarKitArticuloReceta(Request $request){
        
        if (!$request->ajax()) return redirect('/');
        $art = $request->art;
        $dpto = $request->dpto;
        $seccion = $request->seccion;

        $kit = DB::connection('sqlsrv')
        ->select(DB::raw("SELECT K.CODARTICULO
        ,K.TALLA
        ,K.COLOR
        ,K.LINEAKIT
        ,K.CODARTKIT
        ,K.TALLAKIT
        ,K.COLORKIT
        ,K.REFERENCIA
        ,K.DESCRIPCIOKIT
        ,K.REFERENCIAKIT
        ,K.UNIDADES
        ,CASE WHEN K.PRECIOUNIDAD=0 THEN BD1.DBO.CALCOSTEKITSINIVA(K.CODARTKIT,K.TALLAKIT,K.COLORKIT,'','ULTIMOCOSTE',1,1,'F','F','F') ELSE K.PRECIOUNIDAD END PRECIO
        ,CASE WHEN K.PRECIOUNIDAD=0 THEN K.UNIDADES* BD1.DBO.CALCOSTEKITSINIVA(K.CODARTKIT,K.TALLAKIT,K.COLORKIT,'','ULTIMOCOSTE',1,1,'F','F','F') ELSE K.UNIDADES * K.PRECIOUNIDAD END TOTAL
        ,AL.ULTIMOCOSTE
        ,K.UNIDADES * AL.ULTIMOCOSTE TOTALCOSTO
        ,K.IMPRIMIRLINEA
        ,K.UNIDADES2
        ,K.COMENTARIO
       ,Z.MEDIDAKIT
       ,A.UNIDADMEDIDA
    FROM DBO.KITS K INNER JOIN ARTICULOS A ON K.CODARTICULO = A.CODARTICULO
       INNER JOIN (SELECT CODARTICULO CODIGO,UNIDADMEDIDA MEDIDAKIT FROM ARTICULOS) Z ON Z.CODIGO = K.CODARTKIT
   LEFT JOIN ARTICULOSLIN AL ON K.CODARTKIT = AL.CODARTICULO
    WHERE K.CODARTICULO = :art AND DPTO = :dpto   AND   (a.seccion =:seccion OR A.SECCION = 0)"), array(
                    
                    'art' => $art,
                    'dpto' => $dpto,
                    'seccion' => $seccion));

                    return ['kit' => $kit];
    }

    public function buscarArtModificador(Request $request){
        if (!$request->ajax()) return redirect('/');
        $filtro = $request->filtro;
        $codArt = $request->codart;
        $articulo = DB::connection('sqlsrv')
        ->select(DB::raw(" SELECT X.*, CAST(NEWID() AS NVARCHAR(50)) AS ID
                        ,CASE X.ESARTICULO 
                        WHEN 0 THEN COMS.REFERENCIA
                        ELSE ARTS.REFPROVEEDOR
                        END AS REFERENCIA,
                        :codArt as artprincipal
                FROM (
                SELECT ML.CODARTICULOCOM AS CODIGO, A.DESCRIPCION, ML.ESARTICULO, ML.DOSIS, ML.INCPRECIO, ML.PREDETERMINADO,
                    'T' AS NODISPONIBLE, ML.POSICION, ML.CODFORMATO, COALESCE(F.DESCRIPCION,'---') AS DESCFORMATO
                    FROM MODIFICADORESLIN ML INNER JOIN ARTICULOS A ON(ML.CODARTICULOCOM = A.CODARTICULO)
                    LEFT JOIN FORMATOS F ON (ML.CODFORMATO=F.CODFORMATO)
                    WHERE ML.CODMODIFICADOR = :filtro AND ML.ESARTICULO = 1 
                UNION
                SELECT ML.CODARTICULOCOM AS CODIGO, A.DESCRIPCION, ML.ESARTICULO, ML.DOSIS, ML.INCPRECIO, ML.PREDETERMINADO, 'F' AS NODISPONIBLE, ML.POSICION, 
                    0 AS CODFORMATO, '' AS DESCFORMATO
                    FROM MODIFICADORESLIN ML INNER JOIN COMENTARIOS A ON(ML.CODARTICULOCOM = A.CODCOMENTARIO)
                    WHERE ML.CODMODIFICADOR = :filtro2 AND ML.ESARTICULO = 0
                UNION
                    SELECT ML.CODARTICULOCOM AS CODIGO, M.DESCRIPCION, ML.ESARTICULO, ML.DOSIS, ML.INCPRECIO, ML.PREDETERMINADO, 'F' AS NODISPONIBLE, ML.POSICION, 
                    0 AS CODFORMATO, '' AS DESCFORMATO
                    FROM MODIFICADORESLIN ML INNER JOIN MODIFICADORESCAB M ON(ML.CODARTICULOCOM = M.CODMODIFICADOR) 
                    WHERE ML.CODMODIFICADOR = :filtro3 AND ML.ESARTICULO = 2) X
                LEFT JOIN ARTICULOS ARTS ON ARTS.CODARTICULO = X.CODIGO
                LEFT JOIN COMENTARIOS COMS ON COMS.CODCOMENTARIO = X.CODIGO
                ORDER BY X.POSICION,X.CODFORMATO  
                
                "), array(
                    'codArt' => $codArt,
                    'filtro' => $filtro,
                    'filtro2' => $filtro,
                    'filtro3' => $filtro,));

                    return ['articulo' => $articulo];

    }

    public function buscarModificador(Request $request){
        if (!$request->ajax()) return redirect('/');
        $filtro = $request->filtro;
        $modificador = DB::connection('sqlsrv')
        ->select( DB::raw("SELECT MC.CODMODIFICADOR, MC.DESCRIPCION,
                CHECKED = CASE WHEN MA.POSICION IS NULL THEN 
                                    CAST(0 AS BIT) 
                            ELSE CAST(1 AS BIT)
                        END,
                MA.MULTISELEC, ORDEN, 
                POSICION = CASE WHEN MA.POSICION IS NULL THEN 
                                    9999 
                                ELSE  MA.POSICION 
                                END,
                MA.LIMITE, MA.MINIMO,MA.GRATIS, 
                [dbo].F_CONVERTIRDECTOBIN(MA.GRATIS) AS SGRATIS,
                AUTO = CASE WHEN MA.AUTO IS NULL THEN 
                                    CAST(0 AS BIT) 
                                ELSE MA.AUTO
                    END 
                , MA.IDTARIFAV, COALESCE(T.DESCRIPCION,'TODAS') AS DESCTVENTA 
                , MA.ORDENOPCIONAL 
                FROM MODIFICADORESCAB MC 
                INNER JOIN MODIFICADORESARTICULOS MA 
                    ON(MC.CODMODIFICADOR = MA.CODMODIFICADOR AND (MA.CODARTICULO = :filtro)) 
                LEFT JOIN TARIFASVENTA T ON (T.IDTARIFAV=MA.IDTARIFAV) 
                ORDER BY MA.ORDEN "), array(
                    'filtro' => $filtro,
                ));

          return ['modificador' => $modificador];

    }
    
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = new Articulo();
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->condicion = '1';
        $articulo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '0';
        $articulo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '1';
        $articulo->save();
    }

}
