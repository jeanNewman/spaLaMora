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
            <i class="fa fa-align-justify"></i> Reporte Formas de Pago Tiendas
          </div>
          <div class="card-body">
            <div class="row mb-3">
            <div class="col-md-4 themed-grid-col">
                <div class="input-group">
                    <v-multiselect-listbox :options="optionFPago" v-model="arrayFPago" ></v-multiselect-listbox>
                </div>
            </div>
            <div class="col-md-8 themed-grid-col">
              <div class="pb-3">
                <div class="input-group">
                  <select class="form-control form-control-sm col-md-3" v-model="criterio">
                    <option value="despacho">Tienda</option>
                  </select>
                  <template>
                      <select v-model="buscar" class="form-control form-control-sm" placeholder="Selecciona dato a buscar">
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
                      <button type="submit"
                        @click="listarFormaDePago(fechaIni,fechaFin,criterio,buscar,arrayFPago)"
                        class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
               </div>
            </div>
            
          </div>
            <div class="table-responsive">
              <template>
                <div class="card-body">
                  <div class="form-group">
                    <div  class="table-responsive col-md-12">
                         <template>
                            <div >
                                  <export-excel :data="arrayOrden">
                                    <a class="btn btn-primary text-white float-right mb-2"><i class=" fa fa-file-excel-o"></i> Exportar a Excel </a>
                                  </export-excel>
                            </div> 
                          <BootstrapTable class="table table-borderless table-sm table-striped" :columns="fields" :data="arrayOrden"
                            :options="options"></BootstrapTable>

                        </template>
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
  import excel from 'vue-excel-export'
  import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.esm.js'
  import vMultiselectListbox from 'vue-multiselect-listbox'
  import 'vue-multiselect-listbox/dist/vue-multi-select-listbox.css'
  export default {
    components: {

      excel,
      BootstrapTable,
      vMultiselectListbox,
    },
    props: ['ruta'],
    data() {
      return {

        fields: [

          {
            field: 'tienda',
            title: 'Tienda'

          }, {
            field: 'ruc',
            title: 'RUC'

          },  {
            field: 'cliente',
            title: 'Cliente'

          },{
            field: 'fecha',
            title: 'Fecha'

          },
          {
            field: 'serie',
            title: 'Serie'

          }, {
            field: 'factura',
            title: 'Factura'

          }, {
            field: 'fPago',
            title: 'Forma de Pago'

          }, {
            field: 'importe',
            title: 'Importe'

          },{
            field: 'total',
            title: 'total'

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
                        id: 1
                    },
                     {
                        text: "Tienda Galvez",
                        value: "GALVEZ",
                        
                        id: 2
                    },
                    {
                        text: "Tienda San Isidro",
                        value: "SAN ISIDRO",
                        
                        id: 3
                    }, {
                        text: "Tienda Chorrillos",
                        value: "DARK",
                        
                        id: 4
                    }
                    
                ],

        arrayOrden: [],
        arrayDetalle: [],
        optionFPago: [],
        arrayAllFPago:[],
        arrayFPago:[],
        buscar: '',
        criterio: 'Tienda',
        fechaIni: '',
        fechaFin: '',
       
      }
    },
    methods: {

      listarFormaDePago(fechaIni,fechaFin,criterio,buscar,arrayFPago) {

        let me = this;

        //Obtener los datos del ingreso

        var url = this.ruta + '/rrhh/formaDePago?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio + '&tipo=' + arrayFPago;

        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayOrden = respuesta.fPago;
           
          })
          .catch(function (error) {
            console.log(error);
          });

      },

       async mostrarFormasDePago(){
        let me = this;
   
        var url = this.ruta + '/rrhh/obtenerAllFormasDePago';
        await axios.get(url).then(function (response) {
              var respuesta = response.data;           
              me.arrayAllFPago = respuesta.allFPago;
              
            })
            .catch(function (error) {
              console.log(error);
            });
            me.optionFPago = me.arrayAllFPago.map(element => {
              return element.descripcion
          });
       }

      },

    mounted(){
      this.mostrarFormasDePago();
    }
    

  }

</script>

