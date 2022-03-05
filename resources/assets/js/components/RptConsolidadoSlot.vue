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
          <i class="fa fa-align-justify"></i> Consolidado Articulos por Slot (Bocaditos)
        </div>
        <div class="card-body">
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
                       <option value="10:00 AM - 2:00 PM">10:00 AM - 2:00 PM</option>
                       <option value="2:00 PM - 6:00 PM">2:00 PM - 6:00 PM</option>
                        
                    </select>
                </template>
          </div>
            <div class="input-group">
                <select class="form-control form-control-sm col-md-3" v-model="criterio2">
                  <option value="despacho">Despachado Por</option>
                  <option value="slot">Slot de Entrega</option>

                </select>
                <template v-if="criterio2=='despacho'">
                    <select v-model="buscar2" class="form-control form-control-sm" placeholder="Selecciona dato a buscar">
                      <option v-for="dist in todos" :value="dist.value" :key="dist.id">
                        {{dist.text}}</option>
                    </select>
                </template>
                <template v-if="criterio2=='slot'">
                    <select v-model="buscar2" class="form-control form-control-sm" placeholder="Selecciona dato a buscar">
                      <option value="10:00 AM - 2:00 PM">10:00 AM - 2:00 PM</option>
                       <option value="2:00 PM - 6:00 PM">2:00 PM - 6:00 PM</option>  
                    </select>
                </template>
          </div>
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
              <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" @click="listarXSlot(fechaIni,fechaFin,criterio,buscar,criterio2,buscar2)"
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
            field: 'articulo',
            title: 'Artículo'
          },
          {
            field: 'cantidad',
            title: 'Total Cantidad'
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
        data: [],

        arrayOrden: [],
        idarticulo: '',
        articulo: '',
        cantidad: 0,
        fechaIni: '',
        fechaFin: '',
        criterio:'despacho',
        criterio2:'slot',
        buscar:'',
        buscar2:''
       

      }
    },
    methods: {

      listarXSlot(fechaIni, fechaFin,criterio,buscar,criterio2,buscar2) {
        let me = this;
        
        var url = this.ruta + '/orden/consolidadoArticuloSeccion?fechaini=' + fechaIni + '&fechafin=' + fechaFin
        + '&criterio=' + criterio+ '&buscar=' + buscar + '&criterio2=' + criterio2 + '&buscar2=' + buscar2;
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