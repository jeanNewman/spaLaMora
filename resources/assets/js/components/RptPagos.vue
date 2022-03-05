<template>
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li  class="breadcrumb-item"><a href="/">Escritorio</a></li>
        </ol>
        <div ref="content">
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i v-if="rpt=='pago'" class="fa fa-align-justify">  Reporte de Pagos</i> 
                        <i v-if="rpt=='coment'" class="fa fa-align-justify">  Reporte de Comentarios</i>
                        <i v-if="rpt=='det_serv'" class="fa fa-align-justify">  Reporte de Servicios Detalle</i>
                        <i v-if="rpt=='con_serv'" class="fa fa-align-justify">  Reporte de Servicios Consolidado</i>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                <template v-if="rpt == 'pago'">
                                    <select v-model="criterio" class="form-control form-control-sm">
                                        <option v-for="filtro in filtros" :value="filtro.value" :key="filtro.id">
                                            {{filtro.text}}</option>
                                    </select>
                                    <input v-if="criterio=='cliente'" type="text" v-model="buscar" class="form-control form-control-sm"
                                        placeholder="Texto a buscar">
                                    
                                    <select v-if="criterio == 'banco'" v-model="buscar" class="form-control form-control-sm">
                                        <option v-for="bank in banks" :value="bank.value" :key="bank.id">
                                            {{bank.text}}</option>
                                    </select>
                                    
                                     <select v-if="criterio == 'formaPago'" v-model="buscar" class="form-control form-control-sm">
                                        <option v-for="pago in pagos" :value="pago.value" :key="pago.id">
                                            {{pago.text}}</option>
                                    </select>
                                 </template>  

                                <template v-if="rpt == 'coment'">
                                    <select v-model="criterio1" class="form-control form-control-sm">
                                        <option v-for="filtroC in filtrosC" :value="filtroC.value" :key="filtroC.id">
                                            {{filtroC.text}}</option>
                                    </select>
                                    <select v-if="criterio1 == 'despacho'" v-model="buscar" class="form-control form-control-sm">
                                        <option value="SURCO">Tienda Surco</option>
                                         <option value="GALVEZ">Tienda Galvez</option>
                                         <option value="SI">Tienda San Isidro</option>
                                         <option value="CHORRILLOS">Tienda Chorrillos</option>

                                    </select>
                                    <input v-if="criterio1!='despacho'" type="text" v-model="buscar" class="form-control form-control-sm"
                                        placeholder="Texto a buscar">
                                </template>
                                
                                 <template v-if="(rpt == 'det_serv' || rpt == 'con_serv')">
                                     <select v-model="criterio1" class="form-control form-control-sm">
                                        <option v-for="filtroC in filtrosC" :value="filtroC.value" :key="filtroC.id">
                                            {{filtroC.text}}</option>
                                    </select>
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
                                    <button v-if="rpt == 'pago'" type="submit" @click="listarPagos(buscar,criterio,fechaIni,fechaFin)"
                                        class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>
                                     <button v-if="rpt == 'coment'" type="submit" @click="listarComentario(buscar,criterio1,fechaIni,fechaFin)"
                                        class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>
                                     <button v-if="rpt == 'det_serv'" type="submit" @click="listarPorUsuario(buscar,criterio1,fechaIni,fechaFin,1)"
                                        class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>   
                                      <button v-if="rpt == 'con_serv'" type="submit" @click="listarPorUsuario(buscar,criterio1,fechaIni,fechaFin,2)"
                                        class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>    

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <template v-if="rpt == 'pago'">
                                    <export-excel :data="arrayPagos">
                                        <a class="btn btn-primary btn-sm"><i class=" fa fa-file-excel-o"></i>Exportar a
                                            Excel </a>
                                    </export-excel>
                                  </template>
                                  <template v-if="rpt == 'coment'">
                                    <export-excel :data="arrayComentario">
                                        <a class="btn btn-primary btn-sm"><i class=" fa fa-file-excel-o"></i>Exportar a
                                            Excel </a>
                                    </export-excel>
                                  </template>
                                  <template v-if="rpt == 'det_serv' || rpt == 'con_serv'">
                                    <export-excel :data="arrayUsuario">
                                        <a class="btn btn-primary btn-sm"><i class=" fa fa-file-excel-o"></i>Exportar a
                                            Excel </a>
                                    </export-excel>
                                  </template>
                                </div>
                            </div>


                        </div>
                        <div class="table-responsive">
                            <template>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="table-responsive col-md-12">
                                            <template v-if="rpt == 'pago'" >

                                                <BootstrapTable class="table table-borderless table-sm table-striped"
                                                   
                                                    :columns="fields" :data="arrayPagos" :options="options">
                                                </BootstrapTable>

                                            </template>
                                            <template v-if="rpt == 'coment'">
                                                 <BootstrapTable class="table table-borderless table-sm table-striped"
                                                   
                                                    :columns="fieldsC" :data="arrayComentario" :options="options">
                                                </BootstrapTable>
                                            </template>

                                             <template v-if="rpt == 'det_serv'">
                                                 <BootstrapTable class="table table-borderless table-sm table-striped"
                                                   
                                                    :columns="fieldsDet" :data="arrayUsuario" :options="options">
                                                </BootstrapTable>
                                            </template>

                                             <template v-if="rpt == 'con_serv'">
                                                 <BootstrapTable class="table table-borderless table-sm table-striped"
                                                   
                                                    :columns="fieldsCons" :data="arrayUsuario" :options="options" data-sort-name="created_at"
                                                    data-sort-order="desc">
                                                </BootstrapTable>
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
        props: {
            ruta: String,
            rpt: String        
        },
        data() {
            return {

                fields: [

                    {
                        field: 'id',
                        title: 'Nro. Pedido'

                    }, {
                        field: 'nombre',
                        title: 'Cliente'

                    }, {
                        field: 'num_documento',
                        title: 'Documento cliente'

                    }, {
                        field: 'formaPago',
                        title: 'Forma de Pago'

                    },
                    {
                        field: 'banco',
                        title: 'Banco'

                    }, {
                        field: 'deposito',
                        title: 'Nro de Transacción'

                    }

                ],
                  fieldsCons: [

                    {
                        field: 'created_at',
                        title: 'Fecha de Creación',
                        datasortable: 'true'

                    }, {
                        field: 'usuario',
                        title: 'Usuario'

                    }, {
                        field: 'transaccion',
                        title: 'Nro Transacciones'

                    }, {
                        field: 'total',
                        title: 'Importe'

                    },
                 ],
                 
                 fieldsDet: [

                    {
                        field: 'created_at',
                        title: 'Fecha de Creación'

                    }, {
                        field: 'usuario',
                        title: 'Usuario'

                    }, {
                        field: 'id',
                        title: 'Nro Pedido'

                    }, {
                        field: 'total',
                        title: 'Importe'

                    },
                 ],

                 fieldsC: [

                    {
                        field: 'id',
                        title: 'Nro. Pedido'

                    }, {
                        field: 'usuario',
                        title: 'Usuario'

                    }, {
                        field: 'articulo',
                        title: 'Articulo'

                    }, {
                        field: 'cantidad',
                        title: 'Cantidad'

                    }, {
                        field: 'observacion',
                        title: 'Comentario'

                    },
                 ],


                options: {
                    search: false,
                    showColumns: false
                },
                filtrosC: [{
                        text: "Usuario",
                        value: "usuario",
                        id: 1
                    },{
                        text: "Despacho",
                        value: "despacho",
                        id: 2
                    }

                ],
                filtrosS: [{
                        text: "Servicios",
                        value: "Servicios",
                        id: 1
                    }

                ],
                filtros: [{
                        text: "Forma de Pago",
                        value: "formaPago",
                        id: 1
                    },
                    {
                        text: "Banco",
                        value: "estado",
                        id: 2
                    },
                    {
                        text: "Cliente",
                        value: "nombre",
                        id: 3
                    },

                ],
                banks: [{
                        text: "Banbif",
                        value: "BanBif",
                        id: 1
                    },
                    {
                        text: "Interbank",
                        value: "Interbank",
                        id: 2
                    },
                    {
                        text: "Bcp",
                        value: "Bcp",
                        id: 3
                    },
                    {
                        text: "BBVA",
                        value: "Bbva",
                        id: 4
                    },

                ],
                 pagos: [{
                        text: "Depósito o Transferencia",
                        value: "Deposito",
                        id: 1
                    },
                    {
                        text: "Efectivo",
                        value: "Efectivo",
                        id: 2
                    },
                    {
                        text: "Visa",
                        value: "Visa",
                        id: 3
                    },
                    {
                        text: "Yape",
                        value: "Yape",
                        id: 4
                    },
                      {
                        text: "Juntos",
                        value: "Juntos",
                        id: 5
                    },

                ],
                arrayPagos: [],
                arrayComentario:[],
                arrayDetalle: [],
                arrayUsuario: [],
              
                buscar: '',
                criterio: 'formaPago',
                criterio1: 'despacho',
                fechaIni: '',
                fechaFin: '',
                orden: '',
                modal: 0,
                tituloModal: ''

            }
        },
        methods: {

            listarPagos( buscar, criterio, fechaIni, fechaFin) {

                let me = this;

                //Obtener los datos del ingreso

                var url = this.ruta + '/orden/obtenerPagos?fechaini=' + fechaIni + '&fechafin=' + fechaFin +
                    '&buscar=' + buscar + '&criterio=' + criterio;

                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                       
                        me.arrayPagos = respuesta.ordenes;
                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            listarComentario( buscar, criterio1, fechaIni, fechaFin) {

                let me = this;

                //Obtener los datos del ingreso

                var url = this.ruta + '/orden/obtenerComentario?fechaini=' + fechaIni + '&fechafin=' + fechaFin +
                    '&buscar=' + buscar + '&criterio=' + criterio1;

                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                       
                        me.arrayComentario = respuesta.ordenes;
                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
              listarPorUsuario( buscar, criterio1, fechaIni, fechaFin,value) {

                let me = this;

                //Obtener los datos del ingreso

                var url = this.ruta + '/orden/obtenerInfoPorUsuarios?fechaini=' + fechaIni + '&fechafin=' + fechaFin +
                    '&buscar=' + buscar + '&criterio=' + criterio1 + '&value=' + value;

                axios.get(url).then(function (response) {
                        var respuesta = response.data;
                       
                        me.arrayUsuario = respuesta.ordenes;
                        
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            listarDetalle(items) {

                let me = this;
                me.arrayDetalle = JSON.parse(items);
                return me.arrayDetalle;
            },

          
        }

    }
</script>
