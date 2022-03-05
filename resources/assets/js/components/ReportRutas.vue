<template>
  <main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
    </ol>
    <div ref="content">
      <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Reporte de Despacho
          </div>
          <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                <div class="input-group">
                  <select class="form-control form-control-sm col-md-3" v-model="criterio">
                    <option value="despacho">Despachado por</option>
                    <option value="nombre">Ciente</option>
                    <option value="ruta">Ruta</option>
                    <option value="distrito">Distrito</option>
                    <option value="id">Id</option>
                  </select>
                   <template v-if="criterio == 'ruta'">
                    <select v-model="buscar" class="form-control form-control-sm">
                      <option v-for="(allRuta) in arrayAllRutas" :value="allRuta.allRuta" :key="allRuta.index">
                        {{allRuta.allRuta}}</option>
                    </select>
                  </template>
                  <template v-else-if="criterio == 'despacho'">
                     <select  v-model="buscar" class="form-control form-control-sm">
                      <option value="SURCO">Tienda Surco</option>
                       <option value="GALVEZ">Tienda Galvez</option>
                       <option value="SI">Tienda San Isidro</option>
                      <option value="CHORRILLOS">Tienda Chorrillos</option>
                      
                     </select>
                  
                  </template>
                  <template v-else>
                    <input type="text" v-model="buscar" class="form-control form-control-sm"
                      placeholder="Texto a buscar">
                  </template>



                </div>

              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <select class="form-control form-control-sm col-md-3" v-model="criterio3">
                    <option value="despacho">Despachado por</option>
                    <option value="nombre">Ciente</option>
                    <option value="ruta">Ruta</option>
                    <option value="distrito">Distrito</option>
                    <option value="id">Id</option>
                  </select>
                   <template v-if="criterio3 == 'ruta'">
                    <select v-model="buscar2" class="form-control form-control-sm">
                      <option v-for="(allRuta) in arrayAllRutas" :value="allRuta.allRuta" :key="allRuta.index">
                        {{allRuta.allRuta}}</option>
                    </select>
                  </template>
                  <template v-else-if="criterio3 == 'despacho'">
                     <select  v-model="buscar2" class="form-control form-control-sm">
                      <option value="SURCO">Tienda Surco</option>
                       <option value="GALVEZ">Tienda Galvez</option>
                       <option value="SI">Tienda San Isidro</option>
                      <option value="CHORRILLOS">Tienda Chorrillos</option>
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
              <div class="col-md-3">
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha Inicial</label>
                  <input type="date" v-model="fechaIni" class="form-control form-control-sm input-md">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha Fin</label>
                  <input type="date" v-model="fechaFin" class="form-control form-control-sm input-md">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha de Creación</label>
                  <div class="input-group">
                   <select class="form-control form-control-sm col-md-4" v-model="criterio2">
                    <option value="="> Igual </option>
                    <option value="<="> Menor igual </option>
                    <option value=">="> Mayor igual </option>
                  </select>
                   <input type="date" v-model="fechaCreacion" class="form-control form-control-sm input-md">
               </div>
               </div>
              </div>
             
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" @click="listarPedidos(1,buscar,criterio,buscar2,criterio3,fechaIni,fechaFin,criterio2,fechaCreacion,1)"
                    class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Despacho</button>
                   <button type="submit" @click="listarPedidos(1,buscar,criterio,buscar2,criterio3,fechaIni,fechaFin,criterio2,fechaCreacion,2)"
                    class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Cajera</button>  
                    <button  class="btn btn-primary btn-sm"> <export-excel :data="arrayExcel">
                    <i class=" fa fa-file-excel-o"></i> Exportar a Excel 
                  </export-excel>
                  </button>
                </div>
              </div>
             

            </div>
            <div class="table-responsive">
              <template>
                <div class="card-body">
                  <div class="form-group">
                    <div ref="pdf" class="table-responsive col-md-12">
                      <table id="my-table" class="table table-borderless  table-sm">
                        <tbody v-if="arrayOrden.length">
                          <h1 v-if="vista==1">Reporte Despacho</h1>
                           <h1 v-if="vista==2">Reporte Cajera</h1>
                           <br>
                          <tr v-for="orden in arrayOrden" :key="orden.id">
                            <template v-if="vista==1">
                            <h3># Pedido: {{ orden.id }}</h3>
                            <hr style="color: #0056b2;" />
                             
                                           <b-row>
                                               <b-col lg="4">
                                                <b-card>
                                                    <b-row><b-col md="12" ><b># Pedido: </b>{{ orden.id }}</b-col></b-row> 
                                                    <b-row><b-col md="12" ><b># Pedido Shopify: </b>{{ orden.idShopify!=null?orden.idShopify.replace(/H/g, "#"):'' }}</b-col></b-row>                              
                                                    <b-row><b-col  md="12" ><b>Fecha De Entrega: </b>{{ orden.fecha_entrega }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Slot Hora de Entrega: </b>{{ orden.slot }}</b-col> </b-row>  
                                                    <b-row><b-col  md="12" ><b>Despachado Por: </b>{{ orden.despacho }}</b-col> </b-row>  
                                                    <b-row><b-col  md="12" ><b>Fecha De Registro: </b>{{ orden.created_at }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Ruta: </b>{{ orden.rutas }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Cliente: </b>{{ orden.nombre }}</b-col> </b-row>
                                                    <template v-if="orden.distrito.indexOf('RECOGER') == -1">
                                                      <b-row><b-col  md="12" ><b>Dirección: </b>{{ orden.direccion }}</b-col> </b-row>
                                                    </template>  
                                                    <b-row><b-col  md="12" ><b>Observación: </b>{{ orden.observacion }}</b-col> </b-row>
                                                   <template v-if="orden.nombre_cliente!=null"> 
                                                    <b-row><b-col  md="12" ><b>Contacto: </b>{{ orden.nombre_cliente }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Teléfono Contacto: </b>{{ orden.telefono }}</b-col> </b-row>
                                                     <template v-if="orden.distrito.indexOf('RECOGER') == -1">
                                                        <b-row><b-col  md="12" ><b>Direccion de Entrega: </b>{{ orden.destino}}</b-col> </b-row>
                                                     </template>
                                                   </template>
                                                   <b-row><b-col  md="12" ><b>Distrito: </b>{{ orden.distrito }}</b-col> </b-row>

                                                </b-card>
                                               </b-col>
                                               <b-col lg="8">
                                                <b-card>
                                                   <div class="form-group">
                                                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                                                      <table class="table table-bordered table-striped table-sm">
                                                        <thead class="thead-dark">
                                                          <tr>
                                                            <th>Código</th>
                                                            <th>Artículo</th>
                                                            <th>Cantidad</th>
                                                            <th>Comentario</th>

                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          <tr v-for="detalle in listarDetalle(orden.items) " :key="detalle.id">
                                                            <td v-text="detalle.idarticulo">
                                                            </td>
                                                            <td v-text="detalle.articulo">
                                                            </td>

                                                            <td v-text="detalle.cantidad">
                                                            </td>
                                                            <td v-text="detalle.comentario">
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
                             <template v-if="vista==2">
                            <h2># Pedido: {{ orden.id }}</h2>
                            <hr style="color: #0056b2;" />
                             
                                           <b-row>
                                               <b-col lg="4">
                                                <b-card>
                                                    <b-row><b-col md="12" ><b># Pedido: </b>{{ orden.id }}</b-col></b-row> 
                                                    <b-row><b-col md="12" ><b># Pedido Shopify: </b>{{ orden.idShopify!=null?orden.idShopify.replace(/H/g, "#"):'' }}</b-col></b-row>                              
                                                    <b-row><b-col  md="12" ><b>Fecha De Entrega: </b>{{ orden.fecha_entrega }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Despachado Por: </b>{{ orden.despacho }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Tipo de Documento: </b>{{ orden.tipo_documento }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b># Documento: </b>{{ orden.num_documento }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Cliente: </b>{{ orden.nombre }}</b-col> </b-row>
                                                                                                       
                                                    <b-row><b-col  md="12" ><b>Distrito: </b>{{ orden.distrito }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Dirección: </b>{{ orden.direccion }}</b-col> </b-row>
                                                   
                                                    <b-row><b-col  md="12" ><b>Forma de Pago: </b>{{ orden.formaPago }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Banco: </b>{{ orden.banco }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b># de Depósito: </b>{{ orden.deposito }}</b-col> </b-row>
                                                    <b-row><b-col  md="12" ><b>Observación: </b>{{ orden.observacion }}</b-col> </b-row>
                                                

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
                                                                        
                                                                        <th>Artículo</th>
                                                                        <th>Precio</th>
                                                                        <th>Cantidad</th>
                                                                        <th>Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr v-for="detalle in listarDetalle(orden.items) " :key="detalle.id">
                                                                        <slot v-bind:detalle="detalle">
                                                                          
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

                                                                        </slot>
                                                                    </tr>

                                                                    <tr style="background-color: #CEECF5;">
                                                                        <td colspan="3" align="right"><strong>Total
                                                                                Neto:</strong></td>
                                                                        <td class="font-weight-bold">S. {{orden.total}}
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
                            <br>
                            <br>
                    
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>


  </main>
</template>

<script>
  import excel from 'vue-excel-export';

  export default {
    components: {

      excel
    },
    props: ['ruta'],
    data() {
      return {


        arrayExcel: [],
        arrayTest: [],
        arrayOrden: [],
        arrayDetalle: [],
        arrayAllRutas: [],
        buscar: '',
        criterio: 'ruta',
        criterio3:'despacho',
        buscar2:'',
        fechaIni: '',
        fechaFin: '',
        orden: '',
        modal: 0,
        tituloModal: '',
        fechaCreacion:'2020-03-30',
        vista:0,
        criterio2:">="

      }
    },
    methods: {

      listarPedidos(valor, buscar, criterio,buscar2,criterio3, fechaIni, fechaFin,criterio2,fechaCreacion,dato) {

        let me = this;

        //Obtener los datos del ingreso
        me.vista = dato;
        var url = this.ruta + '/orden/obtenerCabeceraAll?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio + '&buscar2=' +
          buscar2 + '&criterio3=' + criterio3 +  '&criterio2=' + criterio2 + '&creacion=' + fechaCreacion;

        var removeItemFromArr = (arr, item) => {
          var i = arr.indexOf(item);
          i !== -1 && arr.splice(i, 1);
        };

        function iterate(item, index) {
          var valueItems = JSON.parse(item.items);
          traverse(valueItems, process);


        }

        //called with every property and its value
        function process(key, value) {
          me.arrayExcel.items = key + " : " + value;
          console.log(key + " : " + value);
        }

        function traverse(o, func) {
          for (var i in o) {
            func.apply(this, [i, o[i]]);
            if (o[i] !== null && typeof (o[i]) == "object") {
              //going one step down in the object tree!!
              traverse(o[i], func);
            }
          }
        }

        //that's all... no magic, no bloated framework


        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayOrden = respuesta.ordenes.data;
            me.arrayExcel = respuesta.ordenes.data;
            me.pagination = respuesta.pagination;

            //     me.arrayExcel.forEach(iterate);
            //     me.arrayTest = removeItemFromArr( me.arrayExcel, 'items' );
            //        me.arrayTest.forEach(iterate);
          })
          .catch(function (error) {
            console.log(error);
          });
         me.buscar='';

      },
      listarDetalle(items) {

        let me = this;
        me.arrayDetalle = JSON.parse(items);
        return me.arrayDetalle;
       
      },

      pdfOrden(tipo,buscar, criterio, fechaIni, fechaFin,criterio2,fechaCreacion) {
        // window.open(this.ruta + '/orden/pdfAll'+ ',' + '_blank');

        window.open(this.ruta + '/orden/pdfAll/?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio + '&criterio2=' + criterio2 + '&creacion=' + fechaCreacion + '&tipo=' + tipo, '_blank');
      },

       mostrarRutas(){
        let me = this;

        
        var url = this.ruta + '/orden/obtenerRutas';
        axios.get(url).then(function (response) {
            var respuesta = response.data;           
            me.arrayAllRutas = respuesta.allRutas;
            
          })
          .catch(function (error) {
            console.log(error);
          });
      },

    },
     mounted() {
      this.mostrarRutas();
    }

  }
</script>
