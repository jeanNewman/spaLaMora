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
          <i class="fa fa-align-justify"></i> Consolidado Articulos de Receta
        </div>
        <div class="card-body">
          <div class="form-group row">
            <div class="col-12 col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Fecha Inicial</label>
                <input type="date" v-model="fechaIni" class="form-control form-control-sm input-md">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Fecha Fin</label>
                <input type="date" v-model="fechaFin" class="form-control form-control-sm  input-md">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Fecha de Creación Inicial</label>
                <input type="date" v-model="fechaCreacionInicial" class="form-control form-control-sm input-md">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Hora Inicial</label>
                <input v-model="horaIni" class="form-control form-control-sm input-md" type="time" value="00:00:00" id="example-time-input">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Fecha de Creación Final</label>
                <input type="date" v-model="fechaCreacionFinal" class="form-control form-control-sm input-md">
              </div>
            </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="formGroupExampleInput">Hora Final</label>
                  <input v-model="horaFin" class="form-control form-control-sm input-md" type="time" value="23:59:59" id="example-time-input">
                </div>
              </div>            
          </div>
            <div class="form-group row">
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" @click="listarOrden(fechaIni,fechaFin,horaIni,horaFin,criterio2,fechaCreacionInicial,fechaCreacionFinal)"
                    class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <export-excel :data="arrayOrden">
                    <a class="btn btn-primary"><i class=" fa fa-file-excel-o"></i>Exportar a Excel </a>
                  </export-excel>

                </div>
              </div>
            </div>



            <template>

              <BootstrapTable class="table table-borderless table-sm table-striped" :columns="columns"
                :data="arrayOrden" :options="options"></BootstrapTable>

            </template>
          </div>
        </div>
      </div>
  </main>
</template>

<script>
  import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.esm.js'
  //import { parseTime } from "@/utils/setMetods"
  import excel from 'vue-excel-export'


  export default {
    components: {
      BootstrapTable,
      excel
    },
    props: ['ruta'],
    data() {
      return {

        json_fields: {
          'Código': 'idarticulo',
          'Artículo': 'articulo',
          'Cantidad': 'cantidad'

        },
        json_data: [],
        columns: [{
            title: 'Código',
            field: 'idarticulo'
          },
          {
            field: 'art_detalle',
            title: 'Artículo'
          },
          {
            field: 'receta',
            title: 'Total Cantidad'
          }


        ],
        options: {
          search: false,
          showColumns: false
        },
        data: [],

        arrayOrden: [],
        idarticulo: '',
        articulo: '',
        cantidad: 0,
        fechaIni: '',
        fechaFin: '',
        horaIni:'00:00:00',
        horaFin:'23:59:59',
        fechaCreacionInicial:'2020-03-30',
        fechaCreacionFinal:'2050-03-30',
        criterio2:">="


      }
    },
    methods: {

      listarOrden(fechaIni, fechaFin,horaIni,horaFin,criterio2,fechaCreacionInicial,fechaCreacionFinal) {
        let me = this;
        var inicial = fechaCreacionInicial+' '+horaIni;
        var final = fechaCreacionFinal+' '+horaFin;
        var url = this.ruta + '/orden/consolidadoArticuloReceta?fechaini=' + fechaIni + '&fechafin=' + fechaFin
        + '&horaini=' + inicial+ '&horafin=' + final + '&criterio2=' + criterio2;
        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayOrden = respuesta.consolidadoReceta;
          
          })
          .catch(function (error) {
            console.log(error);
          });
      }


    }

  }
</script>