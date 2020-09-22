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
            <i class="fa fa-align-justify"></i> Reporte de Marcaciones
          </div>
          <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                <div class="input-group">
                  <select class="form-control form-control-sm col-md-3" v-model="criterio">
                    <option value="empleado">Empleado</option>
                    <option value="tienda">Tienda</option>
                    
                  </select>
                  <template v-if="criterio=='empleado'">
                  <input  type="text" v-model="buscar" class="form-control form-control-sm"
                                        placeholder="Texto a buscar">
                  </template>
                  <template  v-else >
                  <select class="form-control form-control-sm col-md-3" v-model="buscar">
                    <option value="AD">Aviación</option>
                    <option value="003">Chorrillos</option>
                    <option value="AE">Galvez</option>
                    <option value="001">Miraflores</option>
                    <option value="007">San Isidro</option>
                    <option value="002">Surco</option>
                  </select>
                  </template>


                </div>

              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha Inicial</label>
                  <input type="date" v-model="fechaIni" class="form-control form-control-sm input-md">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="formGroupExampleInput">Fecha Fin</label>
                  <input type="date" v-model="fechaFin" class="form-control form-control-sm input-md">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" @click="marcaciones(buscar,criterio,fechaIni,fechaFin)"
                    class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <export-excel :data="arrayMarcacion">
                    <a class="btn btn-primary btn-sm"><i class=" fa fa-file-excel-o"></i>Exportar a Excel </a>
                  </export-excel>

                </div>
              </div>


            </div>
            <div class="table-responsive">
              <template>
                <div class="card-body">
                  <div class="form-group">
                    <div  class="table-responsive col-md-12">
                         <template>

                          <BootstrapTable class="table table-borderless table-sm table-striped" :columns="fields" :data="arrayMarcacion"
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
  import excel from 'vue-excel-export';
  import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.esm.js'
  export default {
    components: {

      excel,
      BootstrapTable
    },
    props: ['ruta'],
    data() {
      return {

        fields: [

          {
            field: 'CODVENDEDOR',
            title: 'Cod Vendedor'

          }, {
            field: 'NOMVENDEDOR',
            title: 'Nombre'

          }, {
            field: 'DIA',
            title: 'Fecha',
            

          },  {
            field: 'HORAIN',
            title: 'Entrada'

          },{
            field: 'HORAOUT',
            title: 'Salida'

          },
          {
            field: 'HORAS',
            title: 'Horas Trabajadas',
            align: 'center',
            formatter: function (value) {

              return parseFloat(value).toFixed(2);
            }
          }, {
            field: 'NORMALES',
            title: 'Horas Normales',
            align: 'center',

          },{
            field: 'EXTRAS',
            title: 'Horas Extras',
            align: 'center',
            formatter: function (value) {

              return parseFloat(value).toFixed(2);
            }

          }
         

        ],
       options: {
          search: false,
          showColumns: false
        },

        arrayMarcacion: [],
        arrayDetalle: [],
        buscar: '',
        criterio: 'tienda',
        fechaIni: '',
        fechaFin: '',
        orden: '',
        modal:0,
        tituloModal: ''

      }
    },
    methods: {

      marcaciones(buscar, criterio, fechaIni, fechaFin) {

        let me = this;

        //Obtener los datos del ingreso

        var url = this.ruta + '/rrhh/marcaciones?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio;

        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayMarcacion = respuesta.marcaciones;
            
          })
          .catch(function (error) {
            console.log(error);
          });

      },
      
 
    }

  }
</script>

