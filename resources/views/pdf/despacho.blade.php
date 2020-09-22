<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de pedido</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
<style>
     
.page-break {
    page-break-after: auto;
}


</style>

<body style="font-size: 12px">
    <header>
        <div id="logo">
            <img src="img/logo.png" alt="La Mora Pasteleria" id="imagen">
        </div>

    </header>

    @foreach ($orden as $v)


    <br>
    <div class="col-lg-12 page-break">
        <table class="table table-borderless table-sm">
            
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ruta</th>
                    <th>fecha de Entrega</th>
                    <th>Direccion de Entrega</th>

                </tr>
            </thead >
            <tbody>
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->rutas}}</td>
                    <td>{{$v->fecha_entrega}}</td>
                    <td>{{$v->destino}}</td>

                </tr>
            </tbody>
            
                    <thead>
                        <tr>
                            <th>Distrito</th>
                            <th>Cliente</th>
                            <th>Teléfono</th>
                            <th>Observación</th>
        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$v->distrito}}</td>
                            <td>{{$v->nombre}}</td>
                            <td>{{$v->telefonoCliente}}</td>
                            <td>{{$v->observacion}}</td>
        
                        </tr>
                    </tbody>
                    @if(isset($v->nombre_cliente))
                    <thead  class="thead-light">
                        <tr>
                            
                            <th>Contacto</th>
                            <th>Teléfono Contacto</th>
        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <td>{{$v->nombre_cliente}}</td>
                            <td>{{$v->telefono}}</td>
                        </tr>
                    </tbody>
                   @endif
             
              </div>
 
        </table>
        <div class="col-lg-12 col-md-12 col-sm-12"></div>
        <br>

        <div>
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>Código</th>
                        <th>Artículo</th>
                        <th>Cantidad</th>
                        <th>Comentario</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $d = json_decode($v->items);
                     
                    @endphp
                    
                    @foreach($d as $obj)
                    <tr>
                        <td>{{$obj->idarticulo}}</td>
                        <td>{{$obj->articulo}}</td>
                        <td>{{$obj->cantidad}}</td>
                        <td>{{$obj->comentario}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div style="background-color: #688a7e; height: 5px"></div>
            <br>
        </div>

    </div>

        @endforeach


</body>

</html>