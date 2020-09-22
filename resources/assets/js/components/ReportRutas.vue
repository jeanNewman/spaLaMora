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
                  <button type="submit" @click="listarPedidos(1,buscar,criterio,fechaIni,fechaFin,criterio2,fechaCreacion)"
                    class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>
                  <button @click="pdfOrden(1,buscar,criterio,fechaIni,fechaFin,criterio2,fechaCreacion)" class="btn btn-primary btn-sm">Despacho PDF</button>
                  <button @click="pdfOrden(2,buscar,criterio,fechaIni,fechaFin,criterio2,fechaCreacion)" class="btn btn-primary btn-sm">Cajera PDF</button>
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
                          <tr v-for="orden in arrayOrden" :key="orden.id">

                            <div class="form-group row border">

                              <!-- primera linea -->
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="text-primary">id</label>
                                  <p class="font-weight-bold" v-text="orden.id"></p>
                                </div>

                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="text-primary">Fecha Creacion</label>
                                  <p class="font-weight-bold" v-text="orden.created_at"></p>
                                </div>

                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="text-primary">Fecha Entrega</label>
                                  <p class="font-weight-bold" v-text="orden.fecha_entrega"></p>
                                </div>

                              </div>

                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="text-primary">Ruta</label>
                                  <p class="font-weight-bold" v-text="orden.rutas"></p>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="form-group">
                                  <label class="text-primary">Distrito</label>
                                  <p class="font-weight-bold" v-text="orden.distrito"></p>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <label class="text-primary">Cliente</label>
                                <p class="font-weight-bold" v-text="orden.nombre"></p>
                              </div>


                              <!-- segunda linea -->

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="text-primary">Dirección</label>
                                  <p class="font-weight-bold" v-text="orden.direccion"></p>
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="text-primary">Observación</label>
                                  <p class="font-weight-bold" v-text="orden.observacion"></p>
                                </div>
                              </div>

                              <template v-if="orden.nombre_cliente!=null">

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label class="text-primary">Concatco</label>
                                    <p class="font-weight-bold" v-text="orden.nombre_cliente"></p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label class="text-primary">Teléfono Contacto</label>
                                    <p class="font-weight-bold" v-text="orden.telefono"></p>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="text-primary">Direccion de Entrega</label>
                                    <p class="font-weight-bold" v-text="orden.destino"></p>
                                  </div>
                                </div>

                              </template>

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
                            </div>
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
        fechaIni: '',
        fechaFin: '',
        orden: '',
        modal: 0,
        tituloModal: '',
        fechaCreacion:'2020-03-30',
        criterio2:">="

      }
    },
    methods: {

      listarPedidos(valor, buscar, criterio, fechaIni, fechaFin,criterio2,fechaCreacion) {

        let me = this;

        //Obtener los datos del ingreso

        var url = this.ruta + '/orden/obtenerCabeceraAll?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' +
          buscar + '&criterio=' + criterio + '&criterio2=' + criterio2 + '&creacion=' + fechaCreacion;

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
