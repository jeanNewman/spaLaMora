    @extends('principal')
    @section('contenido')

    @if(Auth::check())
            @if (Auth::user()->idrol == 1)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>

            <template v-if="menu==1">            
                <categoria :ruta="ruta"></categoria>
            </template>

            <template v-if="menu==2">
                <articulo :ruta="ruta"></articulo>
            </template>

            <template v-if="menu==3">
                <ingreso :ruta="ruta"></ingreso>
            </template>

            <template v-if="menu==4">
                <proveedor :ruta="ruta"></proveedor>
            </template>

            <template v-if="menu==5">
                <venta :ruta="ruta"></venta>
            </template>

            <template v-if="menu==13">
                <orden :ruta="ruta"></orden>
            </template>


            <template v-if="menu==6">
                <cliente :ruta="ruta"></cliente>
            </template>

            <template v-if="menu==7">
                <user :ruta="ruta"></user>
            </template>

            <template v-if="menu==8">
                <rol :ruta="ruta"></rol>
            </template>

            <template v-if="menu==9">
                <consultaingreso :ruta="ruta"></consultaingreso>
            </template>

            <template v-if="menu==10">
                <consultaventa :ruta="ruta"></consultaventa>
            </template>

            <template v-if="menu==14">
                <consultaorden :ruta="ruta"></consultaorden>
            </template>

            <template v-if="menu==15">
                <reportrutas :ruta="ruta"></reportrutas>
            </template>

            <template v-if="menu==16">
                <rptdespacho :ruta="ruta"></rptdespacho>
            </template>

            <template v-if="menu==28">
                <rptcajera :ruta="ruta"></rptcajera>
            </template>

            <template v-if="menu==17">
                <recursoshumanos :ruta="ruta"></recursoshumanos>
            </template>
            <template v-if="menu==18">
                <rptpagos :ruta="ruta" :rpt="pago"></rptpagos>
            </template>
            <template v-if="menu==19">
                <rptpagos :ruta="ruta" :rpt="coment"></rptpagos>
            </template>
            <template v-if="menu==23">
                <rptpagos :ruta="ruta" :rpt="det_serv"></rptpagos>
            </template>
            <template v-if="menu==24">
                <rptpagos :ruta="ruta" :rpt="con_serv"></rptpagos>
            </template>
            <template v-if="menu==25">
                <rptpagos :ruta="ruta" :rpt="fazil"></rptpagos>
            </template>
            <template v-if="menu==26">
                <rptconsolidadoslot :ruta="ruta"></rptconsolidadoslot>
            </template>
            <template v-if="menu==27">
                <rptformapago :ruta="ruta"></rptformapago>
            </template>
            <template v-if="menu==20">
                <consolidadoarticuloreceta :ruta="ruta"></consolidadoarticuloreceta>
            </template>
            <template v-if="menu==21">
                <mostrarrecetascostos :ruta="ruta"></mostrarrecetascosotos>
            </template>
            <template v-if="menu==22">
                <uploadcsv :ruta="ruta"></uploadcsv>
            </template>
            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>

            @elseif (Auth::user()->idrol == 2)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>
           
            <template v-if="menu==13">
                <orden :ruta="ruta"></orden>
            </template>

            <template v-if="menu==6">
                <cliente :ruta="ruta"></cliente>
            </template>

            <template v-if="menu==14">
                <consultaorden :ruta="ruta"></consultaorden>
            </template>

            <template v-if="menu==15">
                <reportrutas :ruta="ruta"></reportrutas>
            </template>

            <template v-if="menu==16">
                <rptdespacho :ruta="ruta"></rptdespacho>
            </template>

            <template v-if="menu==28">
                <rptcajera :ruta="ruta"></rptcajera>
            </template>

            <template v-if="menu==19">
                <rptpagos :ruta="ruta" :rpt="coment"></rptpagos>
            </template>

            <template v-if="menu==23">
                <rptpagos :ruta="ruta" :rpt="det_serv"></rptpagos>
            </template>
            <template v-if="menu==24">
                <rptpagos :ruta="ruta" :rpt="con_serv"></rptpagos>
            </template>
            <template v-if="menu==25">
                <rptpagos :ruta="ruta" :rpt="fazil"></rptpagos>
            </template>
            <template v-if="menu==26">
                <rptconsolidadoslot :ruta="ruta"></rptconsolidadoslot>
            </template>
            <template v-if="menu==27">
                <rptformapago :ruta="ruta"></rptformapago>
            </template>

            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            @elseif (Auth::user()->idrol == 3)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>
            <template v-if="menu==1">
                <categoria :ruta="ruta"></categoria>
            </template>

            <template v-if="menu==2">
                <articulo :ruta="ruta"></articulo>
            </template>

            <template v-if="menu==3">
                <ingreso :ruta="ruta"></ingreso>
            </template>

            <template v-if="menu==4">
                <proveedor :ruta="ruta"></proveedor>
            </template>
            <template v-if="menu==9">
                <consultaingreso :ruta="ruta"></consultaingreso>
            </template>
            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            @elseif (Auth::user()->idrol == 4)
            <template v-if="menu==0">
                <dashboard :ruta="ruta"></dashboard>
            </template>
           
            <template v-if="menu==17">
                <recursoshumanos :ruta="ruta"></recursoshumanos>
            </template>
            <template v-if="menu==27">
                <rptformapago :ruta="ruta"></rptformapago>
            </template>
           

            <template v-if="menu==11">
                <h1>Ayuda</h1>
            </template>

            <template v-if="menu==12">
                <h1>Acerca de</h1>
            </template>
            @else

            @endif

    @endif
       
        
    @endsection