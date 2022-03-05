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
          <i class="fa fa-align-justify"></i> Consolidado Articulos de Pedidos
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-4 themed-grid-col">
               <div class="input-group">
                  <v-multiselect-listbox :options="arrayRutaSource" v-model="arrayRutaDestiny" ></v-multiselect-listbox>
              </div>
            </div>
            <div class="col-md-8 themed-grid-col">
              <div class="pb-3">
               <div class="input-group">
                <select class="form-control form-control-sm col-md-3" v-model="criterio">
                  <option value="despacho">Despachado Por</option>
                  <option value="slot">Slot de Entrega</option>


                </select>
                <template v-if="criterio=='despacho'">
                    <select v-model="buscar" class="form-control form-control-sm" placeholder="Selecciona dato a buscar">
                      <option v-for="dist in todos" :value="dist.value" :key="dist.id">
                        {{dist.text}}</option>
                    </select>
                </template>
               <template v-if="criterio=='slot'">
                    <select v-model="buscar" class="form-control form-control-sm" placeholder="Selecciona dato a buscar">
                         <option value="10:00 AM - 1:00 PM">10:00 AM - 1:00 PM</option>
                         <option value="1:00 PM - 4:00 PM">1:00 PM - 4:00 PM</option>
                         <option value="4:00 PM - 8:00 PM">4:00 PM a 8:00 PM</option>
                    </select>
                </template>
               </div>
                  <div class="input-group">
                <select class="form-control form-control-sm col-md-3" v-model="criterio3">
                  <option value="despacho">Despachado Por</option>
                  <option value="slot">Slot de Entrega</option>


                </select>
                <template v-if="criterio3=='despacho'">
                    <select v-model="buscar2" class="form-control form-control-sm" placeholder="Selecciona dato a buscar">
                      <option v-for="dist in todos" :value="dist.value" :key="dist.id">
                        {{dist.text}}</option>
                    </select>
                </template>
               
               </div>
              </div>
              <div class="row">
                <div class="col-md-6 themed-grid-col">
                   <div class="form-group">
                    <label for="formGroupExampleInput">Fecha Inicial</label>
                    <input type="date" v-model="fechaIni" class="form-control form-control-sm input-md">
                  </div>
                </div>
                <div class="col-md-6 themed-grid-col">
                   <div class="form-group">
                    <label for="formGroupExampleInput">Fecha Fin</label>
                    <input type="date" v-model="fechaFin" class="form-control form-control-sm  input-md">
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-6 themed-grid-col">
                   <div class="form-group">
                    <label for="formGroupExampleInput">Fecha de Creación Inicial</label>
                    <input type="date" v-model="fechaCreacionInicial" class="form-control form-control-sm input-md">
                  </div>
                </div>
                <div class="col-md-6 themed-grid-col">
                    <div class="form-group">
                      <label for="formGroupExampleInput">Hora Inicial</label>
                      <input v-model="horaIni" class="form-control form-control-sm input-md" type="time" value="00:00:00"
                        id="example-time-input">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 themed-grid-col">
                  <div class="form-group">
                    <label for="formGroupExampleInput">Fecha de Creación Final</label>
                    <input type="date" v-model="fechaCreacionFinal" class="form-control form-control-sm input-md">
                  </div>
                </div>
                <div class="col-md-6 themed-grid-col">
                    <div class="form-group">
                      <label for="formGroupExampleInput">Hora Final</label>
                      <input v-model="horaFin" class="form-control form-control-sm input-md" type="time" value="23:59:59"
                        id="example-time-input">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 themed-grid-col">
                    <div class="form-group">
                      <button type="submit"
                        @click="listarOrden(fechaIni,fechaFin,horaIni,horaFin,criterio2,fechaCreacionInicial,
                                            fechaCreacionFinal,criterio,buscar,criterio3,buscar2,arrayRutaDestiny)"
                        class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
               </div>
            </div>
            
          </div>
          <div>
            <template v-if="mostrar==1">
              <h4 class="modal-title">Observaciones Especiales</h4>
               <BootstrapTable class="table table-borderless table-sm table-striped" :columns="configColumns" :data="arrayConfig"
                :options="options"></BootstrapTable>
            </template>
          </div>
          <br>
          <div>
            <template>
               <div >
                    <export-excel :data="arrayOrden1">
                      <a class="btn btn-primary text-white float-right mb-2"><i class=" fa fa-file-excel-o"></i> Exportar a Excel </a>
                    </export-excel>
              </div>
              <h4 class="modal-title">Consolidado de Articulos turno mañana</h4>                           
              <bootstrap-table class="table table-borderless table-sm table-striped" :columns="columns" :data="arrayOrden1"
                :options="options"></bootstrap-table>
            </template>
          </div>
           <br>
          <div>
            <template>
               <div >
                    <export-excel :data="arrayOrden2">
                      <a class="btn btn-primary text-white float-right mb-2"><i class=" fa fa-file-excel-o"></i> Exportar a Excel </a>
                    </export-excel>
              </div> 
              <h4 class="modal-title">Consolidado de Articulos turno tarde</h4>
              <bootstrap-table class="table table-borderless table-sm table-striped" :columns="columns" :data="arrayOrden2"
                :options="options"></bootstrap-table>
            </template>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>

  import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.esm.js'
  import vMultiselectListbox from 'vue-multiselect-listbox'
  import 'vue-multiselect-listbox/dist/vue-multi-select-listbox.css';
  
  //import { parseTime } from "@/utils/setMetods"
  import excel from 'vue-excel-export'


  export default {
    components: {
      BootstrapTable,
      vMultiselectListbox,
      excel
    },
    props: ['ruta'],
    data() {
      return {

        
        columns: [{
            title: 'Código',
            field: 'idarticulo'
          },
          {
            field: 'articulo',
            title: 'Artículo'
          },
          {
            field: 'cantidad',
            title: 'Total Cantidad'
          }


        ],

         configColumns: [{
            title: 'Pedido',
            field: 'idordenes'
          },
          {
            field: 'articulo',
            title: 'Artículo'
          },
          {
            field: 'configuracion',
            title: 'Observación'
          }


        ],
        options: {
          search: false,
          showColumns: false
        },
       
        todos: [
                    {
                        text: "Tienda Surco",
                        value: "SURCO",
                        precio: 0,
                        id: 1
                    },
                     {
                        text: "Tienda Galvez",
                        value: "GALVEZ",
                        precio: 0,
                        id: 2
                    },
                    {
                        text: "Tienda San Isidro",
                        value: "SI",
                        precio: 0,
                        id: 3
                    }, {
                        text: "Tienda Chorrillos",
                        value: "CHORRILLOS",
                        precio: 0,
                        id: 4
                    }
                    
                ],
        distrit: [
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
                        id: 24
                    }
          ],
        data: [],
        arrayRutaSource: [],
        arrayAllRutas:[],
        arrayRutaDestiny:[],
        arrayConfig:[],
        arrayOrden1: [],
        arrayOrden2: [],
        idarticulo: '',
        criterio:'despacho',
        criterio3:'slot',
        buscar2:'',
        buscar:'',
        articulo: '',
        cantidad: 0,
        fechaIni: '',
        fechaFin: '',
        horaIni:'00:00:00',
        horaFin:'23:59:59',
        fechaCreacionInicial:'2020-03-30',
        fechaCreacionFinal:'2050-03-30',
        criterio2:">=",
        despacho:'',
        distrito:'',
        mostrar:0


      }
    },
    methods: {

      listarConfiguracion(fechaIni, fechaFin,criterio,buscar){
        let me = this;
        var url = this.ruta + '/orden/buscarConfiguracion?fechaini=' + fechaIni + '&fechafin=' + fechaFin
        + '&criterio=' + criterio+ '&buscar=' + buscar;
        axios.get(url).then(function (response) {
            var respuesta = response.data;
             if (respuesta.ordenes.length !== 0) {
              me.arrayConfig = respuesta.ordenes;
              me.mostrar = 1;
             }
          })
          .catch(function (error) {
            console.log(error);
          });
          

      },
     
      listarOrden(fechaIni, fechaFin,horaIni,horaFin,criterio2,fechaCreacionInicial,fechaCreacionFinal,criterio,buscar,criterio3,buscar2,destino) {
        let me = this;
        me.listarConfiguracion(fechaIni,fechaFin,criterio,buscar,criterio3,buscar2)
        var inicial = fechaCreacionInicial+' '+horaIni;
        var final = fechaCreacionFinal+' '+horaFin;
        var url = this.ruta + '/orden/consolidadoArticulo?fechaini=' + fechaIni + '&fechafin=' + fechaFin
        + '&horaini=' + inicial+ '&horafin=' + final + '&criterio2=' + criterio2 + '&criterio=' + criterio+ '&buscar=' + buscar
        + '&criterio3=' + criterio3+ '&buscar2=' + buscar2 + '&rutas=' + destino;
        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayOrden1 = respuesta.ordenes1;
            me.arrayOrden2 = respuesta.ordenes2;
          
          })
          .catch(function (error) {
            console.log(error);
          });
          me.buscar ='';
        
          me.horaIni='00:00:00';
          me.horaFin='23:59:59';
          me.fechaCreacionInicial='2020-03-30';
          me.fechaCreacionFinal='2050-03-30';

      },
       
       onChangeList: function ({ source, destination }) {
            this.arrayRutaSource = source;
            this.arrayRutaDestiny = destination;

       },

      async mostrarRutas(){
        let me = this;
   
        var url = this.ruta + '/orden/obtenerRutas';
       await axios.get(url).then(function (response) {
            var respuesta = response.data;           
            me.arrayAllRutas = respuesta.allRutas;
            
          })
          .catch(function (error) {
            console.log(error);
          });
          me.arrayRutaSource = me.arrayAllRutas.map(element => {
            return element.allRuta
         });
      },
         
    },
    
    mounted(){
         this.mostrarRutas();
    }

  }
</script>