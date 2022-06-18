<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
        </ol>
        <div class="container-fluid">
            <!-- Ejemplo de tabla Listado -->
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Pedidos
                    <button type="button" @click="mostrarDetalle()" class="btn btn-sm btn-secondary">
                        <i class="icon-plus"></i>&nbsp;Nuevo
                    </button>
                </div>

                <!-- Listado PRINCIPAL-->
                <template v-if="listado==1">
                    <!-- LISTADO VIJO-->
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select v-model="criterio" class="form-control form-control-sm">
                                        <option v-for="filtro in filtros" :value="filtro.value" :key="filtro.id">
                                            {{filtro.text}}</option>
                                    </select>
                                    <template v-if="criterio == 'ruta'">
                                        <select v-model="buscar" class="form-control form-control-sm">
                                            <option v-for="(allRuta) in arrayAllRutas" :value="allRuta.allRuta"
                                                :key="allRuta.index">
                                                {{allRuta.allRuta}}</option>
                                        </select>
                                    </template>
                                    <template v-else>
                                        <input type="text" v-model="buscar" class="form-control form-control-sm"
                                            placeholder="Texto a buscar">
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select v-model="criterio2" class="form-control form-control-sm">
                                        <option v-for="filtro in filtros" :value="filtro.value" :key="filtro.id">
                                            {{filtro.text}}</option>
                                    </select>
                                   <template v-if="criterio2 == 'ruta'">
                                        <select v-model="buscar2" class="form-control form-control-sm">
                                            <option v-for="(allRuta) in arrayAllRutas" :value="allRuta.allRuta"
                                                :key="allRuta.index">
                                                {{allRuta.allRuta}}</option>
                                        </select>
                                    </template>
                                    <template v-else>
                                        <input type="text" v-model="buscar2" class="form-control form-control-sm"
                                            placeholder="Texto a buscar">
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control form-control-sm col-md-3" v-model="criterio3">
                                        <option value="fecha_entrega">Fecha de entrega</option>
                                    </select>

                                    <input type="date" v-model="buscar3" placeholder="buscar fecha"
                                        class="form-control form-control-sm">
                                    <button type="submit"
                                        @click="listarPedidos(1,buscar,criterio,buscar2,criterio2,buscar3,criterio3)"
                                        class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <template>
                                <div>
                                    <b-table :items="items" :fields="fields" striped responsive="sm">
                                        <template v-slot:cell(opciones)="orden">
                                             <button  type="button" @click="abrirModalActualizarPedido(orden.item)"
                                                class="btn btn-warning btn-xs">
                                                <i class="fa fa-clipboard-list fa-xs"></i>
                                            </button> &nbsp;
                                           
                                            <button :disabled="isRole" type="button" @click="cambiarRuta(orden.item.id)"
                                                class="btn btn-info btn-xs">
                                                <i class="fa fa-sitemap fa-xs"></i>
                                            </button> &nbsp;
                                            <template v-if="orden.item.estado=='Registrado'">
                                                <button :disabled="orden.item.usuario!= isUsuario && isRole"
                                                    type="button" class="btn  btn-danger btn-xs"
                                                    @click="desactivarOrden(orden.item.id)">
                                                    <i class="icon-trash fa-xs"></i>

                                                </button>
                                            </template>


                                        </template>

                                        <template v-slot:cell(show_details)="row">
                                            <b-button size="sm" @click="row.toggleDetails" class="mr-2">
                                                {{ row.detailsShowing ? 'Ocultar' : 'Mostrar'}} Detalles
                                            </b-button>


                                        </template>

                                        <template v-slot:row-details="row">
                                           <b-row>
                                               <b-col lg="4">
                                                <b-card>
                                                    <b-row><b-col md="12" ><b>Dni o Ruc: </b>{{ row.item.num_documento }}</b-col></b-row>                              
                                                    <b-row><b-col  md="12" ><b>Teléfono: </b>{{ row.item.telefonoCliente }}</b-col> </b-row>
                                                     <b-row><b-col  md="12" ><b>Fecha De Registro: </b>{{ row.item.created_at }}</b-col> </b-row>
                                                    <template v-if="row.item.distrito.indexOf('RECOGER') == -1">
                                                        <b-row>
                                                            <b-col  md="12" v-if="row.item.destino == null"><b>Direccion de Entrega:</b>{{ row.item.direccion }}</b-col>
                                                            <b-col  md="12" v-else><b>Direccion de Entrega: </b>{{ row.item.destino }}</b-col>
                                                        </b-row>
                                                    </template>
                                                     <b-row><b-col  md="12" ><b>Despachado por: </b>Tienda {{ row.item.despacho }}</b-col> </b-row>
                                                    <b-row><b-col md="12" ><b># Pedido Shopify: </b>{{ row.item.idShopify!=null?row.item.idShopify.replace(/H/g, "#"):'' }}</b-col></b-row>                              
                                                    <b-row><b-col  md="12" ><b>Slot Hora de Entrega: </b>{{ row.item.slot }}</b-col> </b-row>
                                                    <b-row><b-col md="12" ><b>Email: </b>{{ row.item.email }}</b-col></b-row>  
                                                    <b-row><b-col  md="12" ><b>Forma de Pago: </b>{{ row.item.formaPago }}</b-col> </b-row>
                                                                                
                                                    <b-row><b-col  md="12" ><b>Nro de Deposito o Pago: </b>{{ row.item.deposito }}</b-col> </b-row>
                                                    <b-row v-if="row.item.observacion!=null"><b-col  md="12" ><b>Observaciones: </b>{{ row.item.observacion }}</b-col> </b-row>
                                                    <br>                                                
                                                    <b-row v-if="row.item.nombre_cliente != null"><b-col  md="12" ><b>Contacto: </b>{{ row.item.nombre_cliente }}</b-col></b-row>
                                                    <b-row v-if="row.item.nombre_cliente != null"><b-col  md="12" ><b>Telf. Contacto: </b>{{ row.item.nombre_telefono }}</b-col></b-row>
                                                    <b-row><b-col  md="12" ><b>Distrito: </b>{{ row.item.distrito }}</b-col> </b-row>
                                                    <br>
                                                    <b-button size="sm" @click="row.toggleDetails">Ocultar Detalles
                                                    </b-button>
                                                </b-card>
                                               </b-col>
                                               <b-col lg="8">
                                                <b-card>
                                                    <div>
                                                        <!--  <b-table :items="listarDetalle(row.item.items)" :fields="fieldsD" striped responsive="sm"></b-table> -->
                                                        <div class="table-responsive col-md-12">
                                                            <table class="table table-striped table-sm">
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th>Opciones</th>
                                                                        <th>Artículo</th>
                                                                        <th>Precio</th>
                                                                        <th>Cantidad</th>
                                                                        <th>Subtotal</th>
                                                                        <th>Comentario</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for="detalle in sortJSON(JSON.parse(row.item.items),'indice','asc')"
                                                                        v-bind:key="detalle.indice">
                                                                        <slot v-bind:detalle="detalle">
                                                                            <td>
                                                                                  <button  type="button" 
                                                                                    @click="actualizarArtPedido(row.item.id,detalle.idarticulo,detalle.comentario)"
                                                                                    class="btn btn-warning btn-sm">
                                                                                    <i class="fa fa-stethoscope"></i>
                                                                                   
                                                                                </button> &nbsp;
                                                                               

                                                                                <i v-if="detalle.comentario == 'Modificador'"
                                                                                    class="far fa-hand-point-right btn btn-primary btn-sm"></i>

                                                                            </td>
                                                                            <td v-if="detalle.comentario == 'Modificador'">
                                                                                |-----> {{ detalle.articulo }}
                                                                            </td>
                                                                            <td v-else>
                                                                                {{ detalle.articulo }}
                                                                            </td>
                                                                            <td v-text="detalle.precio">
                                                                            </td>
                                                                            <td v-text="detalle.cantidad">
                                                                            </td>
                                                                            <td>
                                                                                {{detalle.precio*detalle.cantidad}}
                                                                            </td>
                                                                            <td v-text="detalle.comentario"> </td>

                                                                        </slot>
                                                                    </tr>
                                                                     <tr v-if="row.item.observacion != null && row.item.observacion.indexOf('CUPON')!=-1" style="background-color: #CEECF5;">
                                                                        <td colspan="4" align="right"><strong>  {{dividir(row.item.observacion,1)}}</strong></td>
                                                                        <td class="font-weight-bold"> {{dividir(row.item.observacion,2)}}
                                                                        </td>
                                                                        
                                                                    </tr>

                                                                    <tr style="background-color: #CEECF5;">
                                                                        <td colspan="4" align="right"><strong>  Total Neto:</strong></td>
                                                                        <td class="font-weight-bold">S. {{row.item.total}}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </b-card>
                                               </b-col>
                                           </b-row>
                                        </template>

                                    </b-table>
                                </div>
                            </template>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#"
                                        @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio,buscar2,criterio2,buscar3,criterio3)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page"
                                    :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#"
                                        @click.prevent="cambiarPagina(page,buscar,criterio,buscar2,criterio2,buscar3,criterio3)"
                                        v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#"
                                        @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio,buscar2,criterio2,buscar3,criterio3)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </template>
                <!--Fin Listado-->
                <!--INGRESO DE DATOS-->
                <template v-else-if="listado==0">
                    <div class="card-body">
                        <!-- CABECERA DE ORDEN -->
                        <div class="form-group row border">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cliente(*)</label>
                                    <v-select :on-search="selectCliente" :filter="fuseSearch" label="nombre"
                                        :options="arrayCliente" :getOptionLabel="option => option.nombre"
                                        placeholder="Buscar Clientes..." :onChange="getDatosCliente"   >
                                        <template #option="{num_documento, nombre}">
                                            {{ num_documento}}
                                            <cite> {{ nombre}}</cite>
                                        </template>
                                        <div @click="abrirModalCliente('persona','registrar')" slot="no-options">Click
                                            Aqui Para Agregar al Nuevo Cliente!</div>
                                    </v-select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Fecha de Entrega</label>
                                    <input type="date" v-model="fecha_entrega" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Slot de Entrega (*)</label>
                                     <select  class="form-control form-control-sm"
                                        v-model="slot">
                                         <option value="10:00 AM - 2:00 PM">10:00 AM - 2:00 PM</option>
                                         <option value="2:00 PM - 6:00 PM">2:00 PM - 6:00 PM</option>                                                             

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <b-form-group label="Agregar Persona Adicional">
                                    <b-form-radio-group id="radio-group-2" v-model="selected2"
                                        name="radio-sub-component">
                                        <b-form-radio :value="true">Si</b-form-radio>
                                        <b-form-radio :value="false">No</b-form-radio>
                                    </b-form-radio-group>
                                </b-form-group>

                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Distrito(*)</label>
                                    <select @change="agregarMovilidad" v-model="distrito"
                                        class="form-control form-control-sm">
                                        <option v-for="cada in todos" :value="cada.value" :key="cada.id">{{cada.text}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                    <label>Despachado por(*)</label>
                                    <select  class="form-control form-control-sm"
                                        v-model="despacho">
                                    
                                        <option value="SURCO">Tienda Surco</option>
                                         <option value="GALVEZ">Tienda Galvez</option>
                                         <option value="SI">Tienda San Isidro</option>
                                        <option value="CHORRILLOS">Tienda Chorrillos</option>
                                                                          

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Forma de Pago(*)</label>
                                    <select class="form-control form-control-sm" v-model="formaPago">
                                        <option value="Deposito">Depósito o Transferencia</option>
                                         <option value="Efectivo">Efectivo</option>
                                         <option value="Visa">Visa</option>
                                         <option value="Yape">Yape</option>
                                        <option value="Juntos">Juntos</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Banco(*)</label>
                                    <select :disabled="formaPago != 'Deposito'" class="form-control form-control-sm"
                                        v-model="banco">
                                        <option value="Banbif">BanBif</option>
                                         <option value="Interbank">Interbank</option>
                                         <option value="Bcp">Bcp</option>
                                        <option value="Bbva">Bbva</option>
                                        <option value="MercadoPago">MercadoPago</option>
                                      
                                         

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nro de Deposito (*)</label>
                                    <input type="text" class="form-control form-control-sm" v-model="deposito"
                                        placeholder="">
                                </div>
                            </div>




                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>OBSERVACIONES</label>
                                    <input type="text" class="form-control form-control-sm" v-model="observacion"
                                        placeholder="Información adicional">
                                </div>
                            </div>

                            <br>
                            <div v-if="selected2" class="row d-flex justify-content-center col-md-12">
                                <b-card title="Información adicional de entrega" bg-variant="light" class="col-lg-11">
                                    <b-card-group deck>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre Contacto</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    v-model="nombre_cliente"
                                                    placeholder="Nombre del destinatario o quien recibe">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Teléfono</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    v-model="telefono" placeholder="Nro de Teléfono fijo o cell">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Destino</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    v-model="destino" placeholder="Dirección de Entrega">
                                            </div>
                                        </div>
                                    </b-card-group>
                                </b-card>
                            </div>
                            <div class="col-md-12">
                                <div v-show="errorOrden" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjVenta" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fin ingreso cabecera-->
                        <!-- inicio ingreso detalle-->
                        <div class="form-group row border">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Artículo <span style="color:red;"
                                            v-show="idarticulo==0">(*Seleccione)</span></label>
                                    <div class="form-inline">
                                        <input type="text" class="form-control form-control-sm col-2" v-model="codigo"
                                            @keyup.enter="buscarArticulo()" placeholder="Ingrese artículo">
                                        <button @click="abrirModal()" class="btn btn-sm btn-primary">...</button>
                                        <input type="text" readonly class="form-control form-control-sm col-9"
                                            v-model="articulo">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Cantidad <span style="color:red;"
                                            v-show="cantidad==0">(*Ingrese)</span></label>
                                    <input type="number" value="0" class="form-control form-control-sm"
                                        v-model="cantidad">

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <button @click="agregarDetalle()"
                                        class="btn btn-sm btn-success form-control-sm form-control btnagregar"><i
                                            class="icon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Cod Articulo</th>
                                            <th>Articulo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Comentario</th>
                                            <th>Subtotal</th>


                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="(detalle,index) in arrayDetalle" :key="detalle.id">
                                            <td>
                                                <button v-if="detalle.comentario != 'Modificador'"
                                                    @click="eliminarDetalle(index)" type="button"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="icon-close"></i>
                                                </button>
                                                <template v-else>
                                                    <button class="btn btn-light" disabled></button>
                                                    <i class="far fa-hand-point-right  btn btn-primary btn-sm"></i>
                                                </template>
                                            </td>
                                            <td v-text="detalle.idarticulo"></td>
                                            <td v-text="detalle.articulo"></td>
                                            <td>
                                                <input :readonly="detalle.idarticulo != 99999" v-model="detalle.precio"
                                                    type="number" class="form-control form-control-sm">
                                            </td>
                                            <td>
                                                <!-- <span style="color:red;" v-show="detalle.cantidad>detalle.stock">Stock: {{detalle.stock}}</span> -->
                                                <input v-model="detalle.cantidad" type="number"
                                                    class="form-control form-control-sm">
                                            </td>
                                            <td v-text="detalle.comentario"></td>
                                            <td>
                                                {{detalle.precio*detalle.cantidad}}
                                            </td>
                                        </tr>
                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="5" align="right"><strong>Total Neto:</strong></td>
                                            <td>S/ {{total=calcularTotal}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="6">
                                                NO hay artículos agregados
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()"
                                    class="btn btn-sm btn-secondary">Cerrar</button>
                                <button type="button" class="btn btn-sm btn-primary"
                                    @click="registrarPedido()">Registrar
                                    Pedido</button>
                            </div>
                        </div>
                    </div>
                </template>
                <!-- Fin Detalle-->
                <!-- Ver ingreso -->
                <template v-else-if="listado==2">
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-primary">#Documento</label>
                                    <p class="font-weight-bold" v-text="num_documento"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary">Cliente</label>
                                <p class="font-weight-bold" v-text="nombre"></p>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-primary">Teléfono</label>
                                    <p class="font-weight-bold" v-text="telefonoCliente"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-primary">Direccion</label>
                                    <p class="font-weight-bold" v-text="direccion"></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-primary">Distrito</label>
                                    <p class="font-weight-bold" v-text="distrito"></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-primary"># Deposito</label>
                                    <p class="font-weight-bold" v-text="deposito"></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-primary">Fecha de Entrega</label>
                                    <p class="font-weight-bold" v-text="fecha_entrega"></p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-primary">Observación</label>
                                    <p class="font-weight-bold" v-text="observacion"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Artículo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Medida</th>
                                            <th>Tipo</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="detalle in arrayDetalle" :key="detalle.id">
                                            <td v-text="detalle.articulo">
                                            </td>
                                            <td v-text="detalle.precio">
                                            </td>
                                            <td v-text="detalle.cantidad">
                                            </td>
                                            <td v-text="detalle.medida">
                                            </td>
                                            <td v-text="detalle.tipo">
                                            </td>
                                            <td>
                                                {{detalle.precio*detalle.cantidad}}
                                            </td>
                                        </tr>

                                        <tr style="background-color: #CEECF5;">
                                            <td colspan="4" align="right"><strong>Total Neto:</strong></td>
                                            <td class="font-weight-bold">S. {{total}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="5">
                                                NO hay artículos agregados
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()"
                                    class="btn btn-sm btn-secondary">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </template>
                <!-- fin ver ingreso -->
            </div>
            <!-- Fin ejemplo de tabla Listado -->
        </div>
        <!--Inicio del modal agregar/actualizar articulos-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModal"></h4>
                        <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control form-control-sm col-md-3" v-model="criterioA">
                                        <option value="descripcion">Nombre</option>
                                        <option value="codarticulo">Código</option>
                                    </select>
                                    <input type="text" v-model="buscarA"
                                        @keyup.enter="listarArticulo(1,buscarA,criterioA,composicion)"
                                        class="form-control form-control-sm" placeholder="Texto a buscar">

                                    <button type="submit" @click="listarArticulo(1,buscarA,criterioA,composicion)"
                                        class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                                <div>
                                    <b-form-checkbox id="checkbox-1" v-model="composicion" name="checkbox-1"
                                        value="true" unchecked-value="false">
                                        TODOS
                                    </b-form-checkbox>


                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Medida</th>
                                        <th>Tipo</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(articulo,index) in arrayArticulo" :key="index">
                                        <td>
                                            <button type="button" @click="agregarDetalleModal(articulo)"
                                                class="btn btn-success btn-sm">
                                                <i class="icon-check"></i>
                                            </button>
                                        </td>
                                        <td v-text="articulo.codigo"></td>
                                        <td v-text="articulo.nombre"></td>
                                        <td v-text="articulo.precio"></td>
                                        <td v-text="articulo.medida"></td>
                                        <td v-text="articulo.tipo"></td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#"
                                        @click.prevent="cambiarPaginaArticulos(pagination.current_page - 1,buscarA,criterioA,composicion)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page"
                                    :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#"
                                        @click.prevent="cambiarPaginaArticulos(page,buscarA,criterioA,composicion)"
                                        v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#"
                                        @click.prevent="cambiarPaginaArticulos(pagination.current_page + 1,buscarA,criterioA,composicion)">Sig</a>
                                </li>
                            </ul>
                        </nav>

                        <div id="stack3" class="modal hide fade" tabindex="-1" :class="{'mostrar' : modal3}"
                            data-focus-on="input:first">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Stack Three</h3>
                            </div>
                            <div class="modal-body">
                                <p>One fine body…</p>
                                <input type="text" data-tabindex="1">
                                <input type="text" data-tabindex="2">
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn">Close</button>
                                <button type="button" class="btn btn-primary">Ok</button>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" @click="cerrarModal()">Cerrar</button>

                    </div>
                </div>
                <!-- /.modal-content  -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--  Fin del modal-->

        <!--Inicio del modal agregar/actualizar modificadorres-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal3}" role="dialog" aria-labelledby="myModalLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModal3"></h4>
                        <button type="button" class="close" @click="cerrarModal3()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Inc de Precio</th>
                                        <th>Dosis</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="modificador in arrayMod" :key="modificador.codigo">
                                        <td>
                                            <button type="button" @click="agregarModificadorModal(modificador)"
                                                class="btn btn-success btn-sm">
                                                <i class="icon-check"></i>
                                            </button>
                                        </td>
                                        <td v-text="modificador.CODIGO"></td>
                                        <td v-text="modificador.DESCRIPCION"></td>
                                        <td v-text="modificador.INCPRECIO"></td>
                                        <td v-text="modificador.DOSIS"></td>



                                    </tr>
                                </tbody>
                            </table>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" @click="cerrarModal3()">Cerrar</button>

                    </div>
                </div>
                <!-- /.modal-content  -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin Modal Modificadores-->

        <!--Inicio del modal agregar/actualizar clientes-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modalCliente}" role="dialog"
            aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModalCliente"></h4>
                        <button type="button" class="close" @click="cerrarModalCliente()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Nombre (*)</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="nombre" class="form-control"
                                        placeholder="Nombre de la persona">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Tipo Documento</label>
                                <div class="col-md-9">
                                    <select v-model="tipo_documento" class="form-control">
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                        <option value="PASS">PASS</option>
                                        <option value="PASS">CE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Número</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="num_documento" class="form-control"
                                        placeholder="Número de documento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Id Juntos</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="idJuntos" class="form-control" placeholder="id juntos">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Dirección</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="direccion" class="form-control" placeholder="Dirección">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Teléfono</label>
                                <div class="col-md-9">
                                    <input type="text" v-model="telefonoCliente" class="form-control"
                                        placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Email</label>
                                <div class="col-md-9">
                                    <input type="email" v-model="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div v-show="errorPersona" class="form-group row div-error">
                                <div class="text-center text-error">
                                    <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error">

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModalCliente()">Cerrar</button>
                        <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarPersona()">Guardar</button>
                        <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarPersona()">Actualizar</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->

        <!--Inicio del modal agregar/actualizar Actualizar Pedidos-->
        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modalActualizarPedido}" role="dialog"
            aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" v-text="tituloModalPedido"></h4>
                        <button type="button" class="close" @click="cerrarModalActualizarPedido()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Despachacho por:</label>
                                <div class="col-md-9">
                                    <select  class="form-control form-control-sm" v-model="despacho">                                    
                                        <option value="SURCO">Tienda Surco</option>
                                         <option value="GALVEZ">Tienda Galvez</option>
                                         <option value="SI">Tienda San Isidro</option> 
                                         <option value="CHORRILLOS">Tienda Chorrillos</option>                                                                       

                                    </select>
                                </div>
                            </div>
                          
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Fecha de Entrega</label>
                                <div class="col-md-9">
                                    <input type="date" v-model="fecha_entrega" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Slot de Entrega</label>
                                <div class="col-md-9">
                                    <select  class="form-control form-control-sm"
                                        v-model="slot">
                                        <option value="10:00 AM - 2:00 PM">10:00 AM - 2:00 PM</option>
                                         <option value="2:00 PM - 6:00 PM">2:00 PM - 6:00 PM</option>
                                                                                                       

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="email-input">Observación</label>
                                <div class="col-md-9">
                                   <input type="text" class="form-control form-control-sm" v-model="observacion"
                                        placeholder="Información adicional">
                                </div>
                            </div>
                           
                           
                          
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="cerrarModalActualizarPedido()">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="actualizarPedido()">Actualizar</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->
    </main>
</template>

<script>
    import auth from '../mixins/auth';
    import vSelect from 'vue-select';
    import Swal from 'sweetalert2'


    export default {
        props: ['ruta'],
        data() {
            return {
                fields: [{
                        key: 'opciones',
                        label: 'Opciones'

                    },
                    {
                        key: 'usuario',
                        label: 'Usuario'

                    },
                    {
                        key: 'id',
                        label: 'Orden #'

                    }, {
                        key: 'nombre',
                        label: 'Cliente'

                    },
                    {
                        key: 'fecha_entrega',
                        label: 'Fecha Entrega'

                    }, {
                        key: 'rutas',
                        label: 'Ruta'

                    }, {
                        key: 'distrito',
                        label: 'Distrito'

                    }, {
                        key: 'estado',
                        label: 'Estado'

                    }, {
                        key: 'show_details',
                        label: 'Detalles'

                    }
                ],
                fieldsD: [{
                        key: 'idarticulo',
                        label: 'Código'

                    },
                    {
                        key: 'articulo',
                        label: 'Artículo'

                    },
                    {
                        key: 'cantidad',
                        label: 'Cantidad'

                    }, {
                        key: 'precio',
                        label: 'Precio'

                    },, {
                        key: 'comentario',
                        label: 'Comentario'

                    }
                ],
                filtros: [{
                        text: "Id Orden",
                        value: "id",
                        id: 1
                    },{
                        text: "id Shopify",
                        value: "idShopify",
                        id: 2
                    },
                    
                    {
                        text: "Ruta",
                        value: "ruta",
                        id: 3
                    },
                    {
                        text: "Estado",
                        value: "estado",
                        id: 4
                    },
                    {
                        text: "Cliente",
                        value: "nombre",
                        id: 5
                    },
                    {
                        text: "Distrito",
                        value: "distrito",
                        id: 6
                    },
                    {
                        text: "Forma de Pago",
                        value: "formaPago",
                        id: 7
                    },
                    {
                        text: "Usuario",
                        value: "usuario",
                        id: 8
                    },
                ],
                todos: [{
                        text: "ATE",
                        value: "ATE",
                        precio: 10,
                        id: 10
                    },{
                        text: "BARRANCO",
                        value: "BARRANCO",
                        precio: 10,
                        id: 1
                    },
                    {
                        text: "CHORRILLOS",
                        value: "CHORRILLOS",
                        precio: 15,
                        id: 2
                    },
                    {
                        text: "JESUS MARIA",
                        value: "JESUS MARIA",
                        precio: 10,
                        id: 3
                    },
                    {
                        text: "LA MOLINA",
                        value: "LA MOLINA",
                        precio: 10,
                        id: 4
                    },
                    {
                        text: "LA VICTORIA",
                        value: "LA VICTORIA",
                        precio: 15,
                        id: 5
                    },
                    {
                        text: "LINCE",
                        value: "LINCE",
                        precio: 10,
                        id: 6
                    },
                    {
                        text: "MAGDALENA",
                        value: "MAGDALENA",
                        precio: 10,
                        id: 7
                    },
                    {
                        text: "MIRAFLORES",
                        value: "MIRAFLORES",
                        precio: 10,
                        id: 8
                    },
                    {
                        text: "PUEBLO LIBRE",
                        value: "PUEBLO LIBRE",
                        precio: 10,
                        id: 9
                    },

                    {
                        text: "SAN BORJA",
                        value: "SAN BORJA",
                        precio: 10,
                        id: 11
                    },
                    {
                        text: "SAN ISIDRO",
                        value: "SAN ISIDRO",
                        precio: 10,
                        id: 12
                    },
                    {
                        text: "SAN LUIS",
                        value: "SAN LUIS",
                        precio: 15,
                        id: 13
                    },
                    {
                        text: "SAN MIGUEL",
                        value: "SAN MIGUEL",
                        precio: 10,
                        id: 14
                    },
                    {
                        text: "SURCO",
                        value: "SURCO",
                        precio: 10,
                        id: 15
                    },
                    {
                        text: "SURQUILLO",
                        value: "SURQUILLO",
                        precio: 10,
                        id: 16
                    },
                     {
                        text: "BREÑA",
                        value: "BREÑA",
                        precio: 10,
                        id: 17
                    },
                     {
                        text: "LOS OLIVOS",
                        value: "LOS OLIVOS",
                        precio: 10,
                        id: 18
                    },
                     {
                        text: "INDEPENDENCIA",
                        value: "INDEPENDENCIA",
                        precio: 10,
                        id: 19
                    }, {
                        text: "SMP",
                        value: "SMP",
                        precio: 10,
                        id: 20
                    },
                    {
                        text: "COMAS",
                        value: "COMAS",
                        precio: 10,
                        id: 25
                    },{
                        text: "RIMAC",
                        value: "RIMAC",
                        precio: 10,
                        id: 26
                    },{
                        text: "SJL",
                        value: "SJL",
                        precio: 10,
                        id: 28
                    },
                    {
                        text: "SJM",
                        value: "SJM",
                        precio: 10,
                        id: 29
                    },
                    {
                        text: "RECOGER SAN ISIDRO",
                        value: "RECOGER SAN ISIDRO",
                        precio: 0,
                        id: 21
                    },
                     {
                        text: "RECOGER EN SURCO",
                        value: "RECOGER EN SURCO",
                        precio: 0,
                        id: 22
                    }, {
                        text: "RECOGER EN GALVEZ",
                        value: "RECOGER EN GALVEZ",
                        precio: 0,
                        id: 23
                    }, {
                        text: "RECOGER EN CHORRILLOS",
                        value: "RECOGER EN CHORRILLOS",
                        precio: 0,
                        id: 27
                    },
                     {
                        text: "TAXI",
                        value: "TAXI",
                        precio: 10,
                        id: 24
                    },
                ],

                
                selected: null,


                items: [],
                arrayAllRutas: [],
                despacho:'',
                orden_id: 0,
                rutas: '',
                cliente: '',
                selected2: false,
                nombre_cliente: '',
                observacion: '',
                telefono: '',
                destino: '',
                distrito: '',
                deposito: '',
                importe_total: '',
                created_at: '',
                movilidad: '',
                modalActualizarPedido: 0,
                tituloModalPedido: 'Actualizar Pedido',
                idActualizar:'',
               
                arrayOrden: [],
                arrayMod: [],
                arrayCliente: [],
                itemsD: [],
                arrayDetalle: [],
                arrayOrdenT: [],
                listado: 1,
                modal: 0,
                tipo: '',
                entrega: '',
                tituloModal: '',
                tipoAccion: 0,
                errorOrden: 0,
                errorMostrarMsjVenta: [],
                pagination: {
                    'total': 0,
                    'current_page': 0,
                    'per_page': 0,
                    'last_page': 0,
                    'from': 0,
                    'to': 0,
                },
                offset: 3,
                criterio: 'estado',
                buscar: '',
                criterio2: 'estado',
                buscar2: '',
                criterio3: 'fecha_entrega',
                buscar3: '',
                criterioA: 'descripcion',
                buscarA: '',
                arrayArticulo: [],
                idarticulo: 0,
                codigo: '',
                nombre: '',
                medida: '',
                articulo: '',
                comentario: 'NA',
                precio: 0,
                cantidad: 0,
                descuento: 0,
                total: 0,
                fecha_entrega: '',
                formaPago: '',
                banco: '',
                nombreModificador:'',
                configuracion:'',
            
                mPrecio: 0,
                // variables de clientes
                num_documento: 0,
                nombre: '',
                modalCliente: '',
                tituloModalCliente: '',
                tituloModal3: '',
                tipo_documento: '',
                direccion: '',
                telefonoCliente: '',
                telefonoValid: '',
                email: '',
                errorPersona: 0,
                errorMostrarMsjPersona: [],
                id: 0,
                idcliente: 0,
                composicion: 'false',
                modificadorDetalles: [],
                modal3: 0,
                adicional: '',
                cantMod: 0,
                idJuntos: '',
                slot:'',
                arrayVerifica: [],

            }
        },
        components: {
            vSelect,
            Swal


        },
        computed: {
            isActived: function () {
                return this.pagination.current_page;
            },


            //Calcula los elementos de la paginación
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }

                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }

                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            },
            calcularTotal: function () {
                var resultado = 0.0;
                for (var i = 0; i < this.arrayDetalle.length; i++) {
                    resultado = resultado + (this.arrayDetalle[i].precio * this.arrayDetalle[i].cantidad);
                }
                return resultado;
            },


        },
        mixins: [auth],
        methods: {

            listarPedidos(page, buscar, criterio, buscar2, criterio2, buscar3, criterio3) {
                let me = this;
                buscar = criterio==='idShopify'?'H'+buscar:buscar;
                buscar2 = criterio2==='idShopify'?'H'+buscar2:buscar2;
                buscar3 = criterio3==='idShopify'?'H'+buscar3:buscar3;
                var url = this.ruta + '/orden?page=' + page + '&buscar=' + buscar + '&criterio=' + criterio +
                    '&buscar2=' + buscar2 + '&criterio2=' + criterio2 + '&buscar3=' + buscar3 + '&criterio3=' +
                    criterio3;
                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                        me.items = respuesta.ordenes.data;
                        // me.itemsD =  respuesta.ordenes.data.items;
                        me.arrayOrden = respuesta.ordenes.data;
                        me.arrayAllRutas = respuesta.allRutas;
                        me.pagination = respuesta.pagination;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            dividir(string,dato){
                let split;
                let cadena;
                if(string === null)
                 return '';
                cadena = string.substring(string.indexOf('CUPON'),string.lenght);

                split = cadena.split(':');
                if(dato===1)
                 return split[0];
                else return split[1];
            },

            sortJSON(data, key, orden) {
                return data.sort(function (a, b) {
                    var x = a[key],
                        y = b[key];

                    if (orden === 'asc') {
                        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                    }

                    if (orden === 'desc') {
                        return ((x > y) ? -1 : ((x < y) ? 1 : 0));
                    }
                });
            },

            fuseSearch(options, search) {
                const fuse = new Fuse(options, {
                    keys: ['num_documento', 'nombre'],
                    shouldSort: true,
                });
                return search.length ? fuse.search(search) : fuse.list;

                me.buscar='';
                me.buscar2='';
            },
            selectCliente(search, loading) {
                let me = this;
                loading(true)

                var url = this.ruta + '/cliente/selectCliente?filtro=' + search;
                axios.get(url).then(function (response) {
                        let respuesta = response.data;
                        q: search
                        me.arrayCliente = respuesta.clientes;
                        loading(false)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getDatosCliente(val1) {
                let me = this;
                me.loading = true;
                me.idcliente = val1.id;
                me.telefonoValid = val1.telefono;
                               
                me.abrirModalCliente('persona','actualizar',val1)
               // me.abrirModalCliente('persona','actualizar',me.arrayCliente)
            },

            buscarArticulo() {
                let me = this;
                var url = this.ruta + '/articulo/buscarArticuloPedido?filtro=' + me.email;

                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                        me.arrayArticulo = respuesta.articulos;

                        if (me.arrayArticulo.length > 0) {
                            me.articulo = me.arrayArticulo[0]['nombre'];
                            me.idarticulo = me.arrayArticulo[0]['codigo'];
                            me.precio = me.arrayArticulo[0]['precio'];
                            me.medida = me.arrayArticulo[0]['medida'];
                            me.tipo = me.arrayArticulo[0]['tipo'];

                        } else {
                            me.articulo = 'No existe artículo';
                            me.idarticulo = 0;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            pdfOrden(id) {
                window.open(this.ruta + '/orden/pdf/' + id + ',' + '_blank');
            },
            cambiarPagina(page, buscar, criterio, buscar2, criterio2, buscar3, criterio3) {
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarPedidos(page, buscar, criterio, buscar2, criterio2, buscar3, criterio3);
            },
            cambiarPaginaArticulos(page, buscarA, criterioA, composicion) {
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarArticulo(page, buscarA, criterioA, composicion);
            },
            encuentra(id) {
                var sw = 0;
                for (var i = 0; i < this.arrayDetalle.length; i++) {
                    if (this.arrayDetalle[i].idarticulo == id) {
                        sw = true;
                    }
                }
                return sw;
            },
            eliminarDetalle(indice) {
                let me = this;
                let cont = 0;
                let detail = me.arrayDetalle;
                let artCod = me.arrayDetalle[indice]['idarticulo'];
                for (var i = 0; i < detail.length; i++) {
                    let dato = detail[i]['adicional'];
                    if (dato === artCod) {
                        cont++;
                    }
                }
                me.arrayDetalle.splice(indice, cont + 1);

            },
            agregarMovilidad() {
                let me = this;
                let dist = me.distrito;
                let mPrecio = 0;
                let info = '';

                me.todos.forEach(myFunction);

                function myFunction(item) {
                    if (item.value === dist) {
                        mPrecio = item.precio;
                        info = item.value === 'RECOGER SAN ISIDRO' ? 'RECOGER SAN ISIDRO' : 'MOVILIDAD';
                    }

                }
                swal({
                    title: 'la movilidad para el distrito: ' + me.distrito + ' es de S/' + mPrecio,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {

                        me.arrayDetalle.push({
                            idarticulo: 99999,
                            articulo: info,
                            cantidad: 1,
                            precio: mPrecio,
                            medida: "NA",
                            comentario: "NA",
                            tipo: "NA",
                            adicional: '',
                            configuracion:''

                        });


                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {

                    }
                })
            },
            agregarDetalle() {
                let me = this;
                if (me.idarticulo == 0 || me.cantidad == 0) {} else {
                    if (me.encuentra(me.idarticulo)) {
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Ese artículo ya se encuentra agregado!',
                        })
                    } else {
                        me.arrayDetalle.push({
                            idarticulo: me.idarticulo,
                            articulo: me.articulo,
                            cantidad: me.cantidad,
                            precio: me.precio,
                            medida: me.medida,
                            comentario: me.comentario,
                            tipo: me.tipo,
                            adicional: '',
                            configuracion: me.configuracion

                        });

                        me.codigo = "";
                        me.idarticulo = 0;
                        me.articulo = "";
                        me.cantidad = 0;
                        me.precio = 0;
                        me.tipo = "";
                        mw.comentario = "";
                        me.configuracion ='';

                        me.stock = 0
                    }
                }

            },

            listarArticulo(page, buscarA, criterioA, composicion) {
                let me = this;
                var url = this.ruta + '/articulo/listarArticuloPedido?page=' + page + '&buscar=' + buscarA +
                    '&criterio=' + criterioA + '&todos=' + composicion;
                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                        me.arrayArticulo = respuesta.articulos.data;
                        me.pagination = respuesta.pagination;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async registrarPedido() {
                if (await this.validarPedido()) {
                    return;
                }

                let me = this;
                
                axios.post(this.ruta + '/orden/registrar', {
                   'idCliente': this.idcliente,
                    'nombre_cliente': this.nombre_cliente,
                    'telefono': this.telefono,
                    'destino': this.destino,
                    'distrito': this.distrito,
                    'despacho': this.despacho,
                    'deposito': this.deposito,
                    'fecha_entrega': this.fecha_entrega,
                    'total': this.total,
                    'formaPago': this.formaPago,
                    'banco': this.banco,
                    'existe': 0,
                    'observacion': this.observacion,
                    'idShopify' : '',
                    'slot':this.slot,
                    'data': this.arrayDetalle

                }).then(function (response) {
                    me.listado = 1;
                    me.listarPedidos(1, '', 'estado', '', 'estado', '', 'estado');
                    me.dnicliente = '';
                    me.nombre_cliente = '';
                    me.telefono = '';
                    me.destino = '';
                    me.distrito = '';
                    me.movilidad = '';
                    me.orden_entrega = '';
                    me.formaPago = "";
                    me.banco = "";
                    me.deposito = "";
                    me.importe_total = '';
                    me.total = 0;
                    me.observacion = '';
                    me.idarticulo = 0;
                    me.articulo = '';
                    me.tipo = "";
                    me.cantidad = 0;
                    me.stock = 0;
                    me.codigo = '';
                    me.despacho ='';
                    me.slot ='';
                    me.arrayDetalle = [];
                  //  window.open(this.ruta + '/orden/pdf/' + response.data.id + ',' + '_blank');
                    console.log(response)
                }).catch(function (error) {
                    console.log(error);
                    console.log(response)
                });
            },

            async mensajeValidador(nroPedido){

                try {
                    const alert =  await Swal.fire({
                             title: 'Verificar Información',
                            text: `Debe haber una orden repetida, por favor abra otra ventana
                            y verifique la información de la Orden#:${nroPedido}, revise nro de deposito tambien.`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'Corregir',
                            confirmButtonText: 'Continuar'
                        });
                    return !!(alert.value && alert.value === true);
                } catch (e) {
                    console.log('error:', e);
                    return false;
                }

             },

            async validarPedido() {
                let me = this;
                me.errorOrden = 0;
                me.errorMostrarMsjVenta = [];
                let validador = '';
                let ordenesId = '';
                var art;
                var urld = this.ruta + '/orden/obtenerOrdenesRepetidas?idCliente=' + me.idcliente  +
                    '&telefono=' + me.telefonoValid  +
                    '&fechafin=' + me.fecha_entrega  +
                    '&formapago=' + me.formaPago +
                    '&deposito=' + me.deposito;
                try{
                    let response = await axios.get(urld)
                    let respuesta = response.data;
                    validador = respuesta.errorValid;
                    if (validador === 'ERR')
                      ordenesId = respuesta.ordenes.id;
                } catch (error) {
                  console.log(error);
                }  

                me.arrayDetalle.map(function (x) {
                    if (x.cantidad > x.stock) {
                        art = x.articulo + " con stock insuficiente";
                        me.errorMostrarMsjVenta.push(art);
                    }
                });
                
                if(validador == "ERR"){
                   if (await me.mensajeValidador(ordenesId) == false){
                        me.errorMostrarMsjVenta.push(`Verifique si el pedido Nro:${ordenesId} esta repetido`);
                   }
                }
                

                if (me.idcliente == '') me.errorMostrarMsjVenta.push("Seleccione un Cliente");
                if (me.deposito == '') me.errorMostrarMsjVenta.push("Debe haber un Nro de Deposito Correcto");
                if (me.distrito == '') me.errorMostrarMsjVenta.push("Agregue el Distrito");
                if (me.despacho == '') me.errorMostrarMsjVenta.push("Agregue la tienda de donde sale el pedido");
                if (me.slot == '') me.errorMostrarMsjVenta.push("Agregue el Slot de hora");
               
                if (me.formaPago == '') me.errorMostrarMsjVenta.push("Agregue el forma de pago");
                if (me.arrayDetalle.length <= 0) me.errorMostrarMsjVenta.push("Ingrese detalles");

                if (me.errorMostrarMsjVenta.length) me.errorOrden = 1;

                return me.errorOrden;
            },
            actualizarPedido(){
                let me = this;

                axios.put(this.ruta + '/orden/actualizar',{
                    'despacho': me.despacho,
                    'slot': me.slot,
                    'fecha_entrega' : me.fecha_entrega,
                    'observacion' : me.observacion,
                    'id': me.idActualizar
                }).then(function (response) {
                    me.cerrarModalActualizarPedido();
                   // me.listarPersona(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            cerrarModalActualizarPedido(){
                this.modalActualizarPedido=0;
            },
            abrirModalActualizarPedido(items) {
                this.modalActualizarPedido=1;
                this.tituloModalPedido = `Actualizar Pedido Nro: ${items.id}`;
                this.idActualizar = items.id;
                this.despacho = items.despacho;
                this.slot = items.slot;
                this.fecha_entrega = items.fecha_entrega;
                this.observacion = items.observacion;
            },
            mostrarDetalle() {
                let me = this;
                me.listado = 0;

                me.idarticulo = 0;
                me.articulo = '';
                me.cantidad = 0;

                me.arrayDetalle = [];
            },
            ocultarDetalle() {
                this.listado = 1;
            },

            obtenerDetalle(id) {

                let me = this;

                var urld = this.ruta + '/orden/obtenerDetalles?id=' + id;

                axios.get(urld).then(function (response) {
                        console.log(response);
                        var respuesta = response.data;
                        me.itemsD = respuesta.detalles;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            verOrden(id) {
                let me = this;
                me.listado = 2;

                //Obtener los datos del ingreso

                var url = this.ruta + '/orden/obtenerCabecera?id=' + id;

                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                        me.arrayOrdenT = respuesta.ordenes;

                        me.num_documento = me.arrayOrdenT[0]['num_documento'];
                        me.nombre = me.arrayOrdenT[0]['nombre'];
                        me.telefonoCliente = me.arrayOrdenT[0]['telefonoCliente'];
                        me.direccion = me.arrayOrdenT[0]['direccion'];
                        me.nombre_cliente = me.arrayOrdenT[0]['nombre_cliente'];
                        me.telefono = me.arrayOrdenT[0]['telefono'];
                        me.destino = me.arrayOrdenT[0]['destino'];
                        me.distrito = me.arrayOrdenT[0]['distrito'];
                        me.rutas = me.arrayOrdenT[0]['rutas'];
                        me.deposito = me.arrayOrdenT[0]['deposito'];
                        me.fecha_entrega = me.arrayOrdenT[0]['fecha_entrega'];
                        me.observacion = me.arrayOrdenT[0]['observacion'];
                        me.total = me.arrayOrdenT[0]['total'];
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                //Obtener los datos de los detalles 
                var urld = this.ruta + '/orden/obtenerDetalles?id=' + id;

                axios.get(urld).then(function (response) {
                        console.log(response);
                        var respuesta = response.data;
                        me.arrayDetalle = respuesta.detalles;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            cerrarModal() {
                this.modal = 0;
                this.tituloModal = '';
            },

            cerrarModal3() {
                this.modal3 = 0;
                this.tituloModal3 = '';
            },
            abrirModal() {
                this.arrayArticulo = [];
                this.modal = 1;
                this.tituloModal = 'Seleccione uno o varios artículos';
            },
            registrarPersona() {
                if (this.validarPersona()) {
                    return;
                }

                let me = this;

                axios.post(this.ruta + '/cliente/registrar', {
                    'nombre': this.nombre,
                    'tipo_documento': this.tipo_documento,
                    'num_documento': this.num_documento,
                    'id_juntos': this.idJuntos,
                    'direccion': this.direccion,
                    'telefono': this.telefonoCliente,
                    'email': this.email
                }).then(function (response) {
                    me.errorMostrarMsjPersona = [];
                    me.errorPersona = 0;
                    if (response.data.errorValid) {
                        me.errorPersona = 1;
                        me.errorMostrarMsjPersona.push(response.data.errorValid[0]);
                    } else {
                        me.nombre = '';
                        me.tipo_documento = 'DNI';
                        me.num_documento = '';
                        me.idJuntos = '';
                        me.direccion = '';
                        me.telefonoCliente = '';
                        me.email = '';
                        me.errorPersona = 0;
                        me.cerrarModalCliente();
                    }


                }).catch(function (error) {
                    me.errorMostrarMsjPersona = [];
                    if (error.response && error.response.status === 500) {
                        console.log(error.response.data)
                    }
                    if (error.response && error.response.status === 422) {
                        me.errorPersona = 1;
                        error.response.data.nombre.forEach(function (element) {
                            me.errorMostrarMsjPersona.push(element);
                        });
                        console.clear();
                    } else {
                        console.log(error);
                    }
                });
            },

            actualizarPersona(){
               if (this.validarPersona()){
                    return;
                }
                
                let me = this;

                axios.put(this.ruta + '/cliente/actualizar',{
                    'nombre': me.nombre,
                    'tipo_documento': me.tipo_documento,
                    'num_documento' : me.num_documento,
                    'id_juntos' : me.idjuntos,
                    'direccion' : me.direccion,
                    'telefono' : me.telefonoCliente,
                    'email' : me.email,
                    'id': me.persona_id
                }).then(function (response) {
                    me.cerrarModalCliente();
                   // me.listarPersona(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },       

            validarPersona() {
                this.errorPersona = 0;
                this.errorMostrarMsjPersona = [];

                if (!this.nombre) this.errorMostrarMsjPersona.push("El nombre de la persona no puede estar vacío.");
                if (!this.telefonoCliente) this.errorMostrarMsjPersona.push("Debe agregar el Nro de Tlf.");
                if (this.errorMostrarMsjPersona.length) this.errorPersona = 1;

                return this.errorPersona;

            },
            cerrarModalCliente() {
                this.modalCliente = 0;
                this.tituloModalCliente = '';
                this.nombre = '';
                this.tipo_documento = 'DNI';
                this.num_documento = '';
                this.idJuntos = '';
                this.direccion = '';
                this.telefonoCliente = '';
                this.email = '';
                this.errorPersona = 0;

            },
            abrirModalCliente(modelo, accion, data = []) {
                switch (modelo) {
                    case "persona": {
                        switch (accion) {
                            case 'registrar': {
                                this.modalCliente = 1;
                                this.tituloModalCliente = 'Registrar Cliente';
                                this.nombre = '';
                                this.tipo_documento = 'DNI';
                                this.idJuntos = '';
                                this.num_documento = '';
                                this.direccion = '';
                                this.telefonoCliente = '';
                                this.email = '';
                                this.tipoAccion = 1;
                                break;
                            }
                              case 'actualizar':
                            {
                                
                                this.modalCliente=1;
                                this.tituloModalCliente='Actualizar Cliente';
                                this.tipoAccion=2;
                                this.persona_id=data['id'];
                                this.nombre = data['nombre'];
                                this.tipo_documento = data['tipo_documento'];
                                this.num_documento = data['num_documento'];
                                this.idJuntos = data['idJuntos'];
                                this.direccion = data['direccion'];
                                this.telefonoCliente = data['telefono'];
                                this.email = data['email'];
                                break;
                            }

                        }
                    }
                }
            },
            cambiarRuta(id) {

                swal({
                    title: 'Cambio de Ruta',
                    type: 'warning',
                    html: '<label class="form-contol from-control-sm">Coloque solo el nro de la RUTA</label> <br>' +
                        '<input id="swal-input1" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" class="swal2-input form-contol from-control-sm ">',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: false,
                    reverseButtons: true,
                    preConfirm: () => {
                        return [
                            document.getElementById('swal-input1').value,

                        ]
                    }
                }).then((result) => {
                    if (result.value) {
                        let me = this;
                        let dato = document.getElementById('swal-input1').value;
                        if (dato != '') {
                            axios.put(this.ruta + '/orden/cambiarruta', {
                                'id': id,
                                'ruta': dato


                            }).then(function (response) {
                                me.listarPedidos(1, '', 'estado', '', 'estado', '', 'estado');
                                swal(
                                    'Correcto!',
                                    'Cambio de ruta realizado',
                                    'success'
                                )
                            }).catch(function (error) {
                                console.log(error);
                            });
                        } else {
                            swal(
                                'Dato en Blanco!',
                                'Tiene que poner un numero en la ruta.',
                                'success'
                            )
                        }

                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {

                    }
                })

            },
            cortesia(id, idart, resta) {
                swal({
                    title: 'Esta seguro de dar en cortesia este Item?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        let me = this;

                        axios.put(this.ruta + '/orden/cortesia', {
                            'id': id,
                            'idart': idart,
                            'resta': resta
                        }).then(function (response) {
                            me.listarPedidos(1, '', 'estado', '', 'estado', '', 'estado');
                            swal(
                                'Cortesia!',
                                'El item es ya es de cortesia.',
                                'success'
                            )
                        }).catch(function (error) {
                            console.log(error);
                        });


                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {

                    }
                })
            },
            desactivarOrden(id) {
                swal({
                    title: 'Esta seguro de anular este pedido?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar',
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        let me = this;

                        axios.put(this.ruta + '/orden/desactivar', {
                            'id': id
                        }).then(function (response) {
                            me.listarPedidos(1, '', 'estado', '', 'estado', '', 'estado');
                            swal(
                                'Anulado!',
                                'La venta ha sido anulada con éxito.',
                                'success'
                            )
                        }).catch(function (error) {
                            console.log(error);
                        });


                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {

                    }
                })
            },

            agregarModificador(data, codArt) {
                let me = this;

                var urld = this.ruta + '/articulo/buscarArtModificador?filtro=' + data[0]['CODMODIFICADOR'] +
                    '&codart=' + codArt;

                axios.get(urld).then(function (response) {

                        var respuesta = response.data;
                        if (respuesta.articulo.length !== 0) {

                            me.arrayMod = respuesta.articulo;
                            me.tituloModal3 = 'Agregue los Modificadores';
                            me.modal3 = 1;


                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            async actualizarArtPedido(ordenId,artId,comment){
                  let me = this;
                  
                  const {
                        value: okComment
                    } = await Swal.fire({
                        title: 'Actualice el Comentario',
                        input: 'text',
                        focusConfirm: false,
                         inputValue: comment,
                            showCancelButton: true,
                            inputValidator: (value) => {
                                if (!value) {
                                return 'Debes Colocar algo!!'
                                }
                            },
                        confirmButtonText: 'Guardar',
                      
                    })

                     if (okComment) {
                         let theComment = okComment.replace(/["']/g, "");
                          axios.put(this.ruta + '/orden/actualizar', {
                            'indice' : 1,
                            'id': ordenId,
                            'idArticulos': artId,
                            'comentario': theComment,
                            }).then(function (response) {
                                me.listarPedidos(1, '', 'estado', '', 'estado', '', 'estado');
                                swal(
                                    'Comentario Listo!',
                                    'El comentario ha sido actualizado con éxito.',
                                    'success'
                                )
                            }).catch(function (error) {
                                console.log(error);
                            });
                     }

            },

            async agregarModificadorModal(data = []) {
                let me = this;
                if (me.encuentra(data['codigo'])) {
                    Swal.fire({
                        type: 'error',
                        title: 'Error...',
                        text: 'Ese artículo ya se encuentra agregado!',
                    })
                } else {

                    const {
                        value: formValues
                    } = await Swal.fire({
                        title: 'Ingrese la Cantidad',
                        html: '<label class="form-contol from-control-sm">Cantidad</label> <br>' +
                            '<input id="swal-input1" class="swal2-input form-contol from-control-sm ">',
                        focusConfirm: false,
                        preConfirm: () => {
                            return [
                                document.getElementById('swal-input1').value,

                            ]
                        }
                    })

                    if (formValues) {
                        // Swal.fire(JSON.stringify(formValues))
                        
                        let total = formValues[0] * data['DOSIS'] * me.cantMod;
                        me.arrayDetalle.push({
                            idarticulo: data['CODIGO'],
                            articulo: data['DESCRIPCION'],
                            precio: data['INCPRECIO'],
                            medida: 'NIU',
                            tipo: 'NA',
                            adicional: data['artprincipal'],
                            comentario: 'Modificador',
                            configuracion:'',
                            cantidad: total,

                        });
                        me.nombreModificador = ' -> '+  data['DESCRIPCION'];
                        me.arrayDetalle.forEach((item,index) =>{
                            if (item.idarticulo === data['artprincipal'] && item.comentario !== 'Modificador'){
                                me.arrayDetalle[index].articulo = me.arrayDetalle[index].articulo + me.nombreModificador;
                            }
                        });
                    }



                }
            },

            async agregarDetalleModal(data = []) {
                let me = this;
                if (1==2) {
                    Swal.fire({
                        type: 'error',
                        title: 'Error...',
                        text: 'Ese artículo ya se encuentra agregado!',
                    })
                } else {

                    const {
                        value: formValues
                    } = await Swal.fire({
                        title: 'Ingrese la Cantidad y Comentario',
                        html: '<label class="form-contol from-control-sm">Cantidad</label> <br>' +
                            '<input id="swal-input1" class="swal2-input form-contol from-control-sm ">' +
                            '<label class="form-contol from-control-sm">Comentario</label> <br>' +
                            '<input id="swal-input2" class="swal2-input form-contol from-control-sm">' +
                            '<label class="form-contol from-control-sm">Configuracion Especial</label> <br>' +
                            '<input id="swal-input3" class="swal2-input form-contol from-control-sm">',
                        focusConfirm: false,
                        preConfirm: () => {
                            return [
                                document.getElementById('swal-input1').value,
                                document.getElementById('swal-input2').value,
                                document.getElementById('swal-input3').value,
                            ]
                        }
                    })

                    if (formValues) {
                        // Swal.fire(JSON.stringify(formValues))
                        let me = this;
                        me.cantMod = formValues[0];
                        var urld = this.ruta + '/articulo/buscarModificador?filtro=' + data['codigo'];

                        axios.get(urld).then(function (response) {

                                var respuesta = response.data;
                                if (respuesta.modificador.length !== 0) {
                                    me.modificadorDetalles = respuesta.modificador;
                                    me.agregarModificador(me.modificadorDetalles, data['codigo']);
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                         //  let nombredata = data['nombre'] + nombreModificador;
                        me.arrayDetalle.push({
                            idarticulo: data['codigo'],
                            articulo: data['nombre'], 
                            precio: data['precio'],
                            medida: data['medida'],
                            tipo: data['tipo'],
                            comentario: formValues[1],
                            cantidad: formValues[0],
                            configuracion: formValues[2],
                            adicional: ''

                        });
                        me.nombreModificador ='';
                    }



                }
            }
        },
        mounted() {
            this.listarPedidos(1, this.buscar, this.criterio, this.buscar2, this.criterio2, this.buscar2, this
                .criterio3, this.buscar3);
            $(function () {

                $('.validanumericos').keypress(function (e) {
                        if (isNaN(this.value + String.fromCharCode(e.charCode)))
                            return false;
                    })
                    .on("cut copy paste", function (e) {
                        e.preventDefault();
                    });

            });
        }
    }
</script>
<style>
.swal2-icon .swal2-icon-content {
    display: flex;
    align-items: center;
    font-size: 1.3em;
}
    .modal-content {
        width: 100% !important;
        position: absolute !important;
        margin-top: 10%;
    }

    .mostrar {
        display: block !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
        overflow-y: auto;

    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .div-error {
        display: flex;
        justify-content: center;
    }

    .text-error {
        color: red !important;
        font-weight: bold;
    }

    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }
</style>