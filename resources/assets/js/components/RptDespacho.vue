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
            <i class="fa fa-align-justify"></i> Reporte de Rutas
          </div>
          <div class="card-body">
            <div class="form-group row">
              <div class="col-md-6">
                <div class="input-group">
                  <select class="form-control form-control-sm col-md-3" v-model="criterio">
                    <option value="nombre">Ciente</option>
                    <option value="ruta">Ruta</option>
                    <option value="Distrito">Distrito</option>
                    <option value="id">Id</option>
                  </select>
                  <template v-if="criterio == 'ruta'">
                    <select v-model="buscar" class="form-control form-control-sm">
                      <option v-for="(allRuta) in arrayAllRutas" :value="allRuta.allRuta" :key="allRuta.index">
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
                  <button type="submit" @click="listarPedidos(1,buscar,criterio,fechaIni,fechaFin)"
                    class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <export-excel :data="arrayOrden">
                    <a class="btn btn-primary btn-sm"><i class=" fa fa-file-excel-o"></i>Exportar a Excel </a>
                  </export-excel>

                </div>
              </div>


            </div>
            <div class="table-responsive">
              <template>
                <div class="card-body">
                  <div class="form-group">
                    <div class="table-responsive col-md-12">
                      <template>

                        <BootstrapTable class="table table-borderless table-sm table-striped" :columns="fields"
                          :data="arrayOrden" :options="options"></BootstrapTable>

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
            field: 'usuario',
            title: 'Usuario'

          }, {
            field: 'id',
            title: 'Nro. Pedido'

          }, {
            field: 'rutas',
            title: 'Ruta'

          }, {
            field: 'nombre',
            title: 'Cliente'

          }, {
            field: 'destino',
            title: 'Dirección de Entrega'

          }, {
            field: 'distrito',
            title: 'Distrito'

          },
          {
            field: 'telefonoCliente',
            title: 'Teléfono'

          }, {
            field: 'nombre_cliente',
            title: 'Contacto'

          },
          {
            field: 'telefono',
            title: 'Telf. Contacto'

          },
          {
            field: 'observacion',
            title: 'Observación'

          }

        ],
        options: {
          search: false,
          showColumns: false
        },

        arrayOrden: [],
        arrayAllRutas: [],
        arrayDetalle: [],
        buscar: '',
        criterio: 'ruta',
        fechaIni: '',
        fechaFin: '',
        orden: '',
        modal: 0,
        tituloModal: ''

      }
    },
    methods: {

      listarPedidos(valor, buscar, criterio, fechaIni, fechaFin) {

        let me = this;

        //Obtener los datos del ingreso

        var url = this.ruta + '/orden/obtenerCabecera?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio;

        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayOrden = respuesta.ordenes.data;
            me.pagination = respuesta.pagination;
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

      pdfOrden(buscar, criterio, fechaIni, fechaFin) {
        // window.open(this.ruta + '/orden/pdfAll'+ ',' + '_blank');

        window.open(this.ruta + '/orden/pdfAll/?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio, '_blank');
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