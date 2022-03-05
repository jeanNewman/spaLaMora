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
                <select class="form-control col-md-3" v-model="criterio">
                  <option value="nombre_cliente">Ciente</option>
                  <option value="ruta">Ruta</option>
                  <option value="Distrito">Distrito</option>

                </select>
              
                
              </div>

            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Fecha Inicial</label>
                <input type="date" v-model="fechaIni" class="form-control input-md">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="formGroupExampleInput">Fecha Fin</label>
                <input type="date" v-model="fechaFin" class="form-control input-md">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <button type="submit" @click="listarPedidos(1,buscar,criterio,fechaIni,fechaFin)"
                      class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
               <button @click="download">download</button>
    
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
          <div   class="table-responsive">
            <template>
              <div class="card-body">
                <div class="form-group">
                  <div class="table-responsive col-md-12">
                    <table id="my-table" class="table table-borderless  table-sm">
                      <tbody v-if="arrayOrden.length">
                        <tr v-for="orden in arrayOrden" :key="orden.id">
                            <div class="form-group row border">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-primary">#Documento</label>
                                        <p class="font-weight-bold" v-text="orden.dnicliente"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-primary">Cliente</label>
                                    <p class="font-weight-bold" v-text="orden.nombre_cliente"></p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="text-primary">Teléfono</label>
                                        <p class="font-weight-bold" v-text="orden.telefono"></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-primary">Destino</label>
                                        <p class="font-weight-bold" v-text="orden.destino"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-primary">Distrito</label>
                                        <p class="font-weight-bold" v-text="orden.distrito"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-primary">Orden de entrega</label>
                                        <p class="font-weight-bold" v-text="orden.orden_entrega"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="text-primary">Fecha</label>
                                        <p class="font-weight-bold" v-text="orden.created_at"></p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="text-primary">Movilidad</label>
                                        <p class="font-weight-bold" v-text="orden.movilidad"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-primary">Observación</label>
                                        <p class="font-weight-bold" v-text="orden.observacion"></p>
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
                                      <tbody>
                                          <tr v-for="detalle in listarDetalle(orden.id)" :key="detalle.id">
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
                                              <td class="font-weight-bold">S. {{orden.total}}</td>
                                          </tr>
                                      </tbody>
                                                      
                                  </table>
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

import jsPDF from "jspdf";
import autoTable from 'jspdf-autotable';
import html2canvas from "html2canvas";

  export default {
    components: {
     
      excel
    },
    props: ['ruta'],
    data() {
      return {

        fields: [

          {
            key: 'created_at',
            label: 'Fecha:Hora'

          }, {
            key: 'ruta',
            label: 'Ruta'

          }, {
            key: 'distrito',
            label: 'Distrito'

          }, {
            key: 'destino',
            label: 'Destino'

          }, {
            key: 'nombre_cliente',
            label: 'Cliente'

          },
          {
            key: 'telefono',
            label: 'Teléfono'

          }, {
            key: 'observacion',
            label: 'Observación'

          }
        ],
column: [

          {
           
            label: 'Fecha:Hora'

          }, {
          
            label: 'Ruta'

          }, {
            
            label: 'Distrito'

          }, {
            
            label: 'Destino'

          }, {
            
            label: 'Cliente'

          },
          {
            
            label: 'Teléfono'

          }, {
            
            label: 'Observación'

          }
        ],

        arrayOrden: [],
        arrayDetalle : [],
        buscar: '',
        criterio: 'ruta',
        fechaIni: '',
        fechaFin: '',
        orden:''

      }
    },
    methods: {

      listarPedidos(valor,buscar,criterio,fechaIni, fechaFin) {
             
                let me=this;
                                
                //Obtener los datos del ingreso
               
                var url= this.ruta + '/orden/obtenerCabeceraAll?fechaini=' + fechaIni + '&fechafin=' + fechaFin + '&buscar=' + buscar + '&criterio=' + criterio;
                
                axios.get(url).then(function (response) {
                  var respuesta = response.data;
                  me.arrayOrden = respuesta.ordenes.data;
                  me.pagination = respuesta.pagination;
                })
                .catch(function (error) {
                  console.log(error);
                });
                
               
            
      },
      listarDetalle(id){

             let me=this;
            var urld= this.ruta +'/orden/obtenerDetalles?id=' + id;
                
                axios.get(urld).then(function (response) {
                    console.log(response);
                    var respuesta= response.data;
                    me.arrayDetalle = respuesta.detalles;
                })
                .catch(function (error) {
                    console.log(error);
                });               
            return me.arrayDetalle;
      },
      download() {
        let me = this;
      const doc = new jsPDF('p','pt');
      doc.setFontSize(18)
      doc.text('With content', 14, 22)
      doc.setFontSize(11)
      doc.setTextColor(100)

      // jsPDF 1.4+ uses getWidth, <1.4 uses .width
      var pageSize = doc.internal.pageSize
      var pageWidth = pageSize.width ? pageSize.width : pageSize.getWidth()
      var text = "texto"
      doc.text(text, 14, 30)
      doc.autoTable({ html: '#my-table' })

     /*  doc.autoTable({
        head: me.column,
        body: me.arrayOrden,
        startY: 50,
        showHead: 'firstPage',
      }) */
     /*  doc.setFont("times");
      doc.setFontStyle("normal");
      doc.setFontSize(8);
     
      /** WITHOUT CSS */
     /*  const contentHtml = this.$refs.content.innerHTML;
      doc.fromHTML(contentHtml, 10, 10, {
          width: 230
                    
          
        }); */ 
      doc.save("sample.pdf");
    },
     downloadWithCSS() {
        const doc = new jsPDF('p','pt');
        /** WITH CSS */
        var canvasElement = document.createElement('canvas');
          html2canvas(this.$refs.content, { canvas: canvasElement 
            }).then(function (canvas) {
          const img = canvas.toDataURL("image/jpeg", 0.8);
          doc.addImage(img,'JPEG',20,20);
          doc.save("sample.pdf");
        });
 }
  


    }

  }
</script>
 