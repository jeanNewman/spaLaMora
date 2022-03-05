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
            <i class="fa fa-align-justify"></i> RECETAS
          </div>
          <div class="card-body">
            <!-- filtros -->
            <div class="form-group row">
               <div class="col-md-4">
                <div class="form-group">
                  <label for="formGroupExampleInput">Departamento</label>
                  <select v-model="buscar_dpto" @change="mostrarSecciones(buscar_dpto)" class="form-control form-control-sm" >
                      <option v-for="(dpto,index) in arrayDpto " :value="dpto.nro_dpto" :key="index">
                        {{dpto.nombre_dpto}}</option>
                    </select>
                </div>
               </div>
                 <div class="col-md-4">
                <div class="form-group">
                  <label for="formGroupExampleInput">Secciones</label>
                  <select v-model="buscar_seccion" class="form-control form-control-sm">
                      <option v-for="(secc,index) in arraySeccion " :value="secc.nro_seccion" :key="index">
                        {{secc.nombre_seccion}}</option>
                    </select>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" @click="mostrarArticuloReceta(buscar_dpto,buscar_seccion)"
                    class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Buscar</button>

                </div>
              </div>

              </div>
            </div>
            <!-- inicio area de recetas -->
            <div class="row" > 
           <div class="m-3 " v-for="(art,index) in arrayArt" :key="index" >           
            <b-card-group deck >
             <b-card  
                no-body
                style="max-width: 30rem;"
                img-src="https://placekitten.com/380/200"
                img-alt="Image"
                img-top
              >
                <template v-slot:header>
                  <h4 class="mb-0">{{ art.SECCION }}</h4>
                </template>

                <b-card-body>
                  <b-card-title>{{art.ITEM}}</b-card-title>
                  <br>
                 <table class="table table-borderless table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Costo sin IGV</th>
                                    <th>Valor Venta</th>
                                    <th>Margen</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="text-primary">
                            
                                    <td>{{art.COSTOSINIGB}}</td>
                                    <td>{{formatPrice(art.VALORVENTA)}}</td>
                                    <td>{{art.MARGEN}}</td>
                                                       
                            </tbody>
                        </table>
                </b-card-body>
                 <b-card-body>
                  
                <template>
                    <mostrarrecetascostosdetalle  :ruta=ruta :dpto=buscar_dpto :seccion=buscar_seccion :codArticulo=art.CODARTICULO></mostrarrecetascostosdetalle>
                </template>
                </b-card-body>


                <b-card-body>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
                </b-card-body>

                <b-card-footer>This is a footer</b-card-footer>

              </b-card>
             
            </b-card-group>
            </div>
            </div>
            <!-- fin area de recetas -->
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import excel from "vue-excel-export";
import BootstrapTable from "bootstrap-table/dist/bootstrap-table-vue.esm.js";
export default {
  components: {
    excel,
    BootstrapTable,
  },
  props: ["ruta"],
  data() {
    return {
      fields: [
        {
          field: "usuario",
          title: "Usuario",
        },
        {
          field: "id",
          title: "Nro. Pedido",
        },
        {
          field: "rutas",
          title: "Ruta",
        },
        {
          field: "nombre",
          title: "Cliente",
        }
      ],
      options: {
        search: false,
        showColumns: false,
      },

      arrayDpto: [],
      arraySeccion: [],
      arrayArt: [],
      arrayKitArt:[],
      buscar_dpto: "",
      buscar_seccion: "",
      buscar_art: "",
      criterio: "ruta",
      fechaIni: "",
      codArticulo:'',
      fechaFin: "",
      orden: "",
      modal: 0,
      mostrar: 0,
      tituloModal: "",
    };
  },
  methods:{

    formatPrice(value) {
        let val = (value/1).toFixed(2);
        return val.toString();
    },

    mostrarArticuloReceta(buscar_dpto,buscar_seccion){
        let me = this;

        var url = this.ruta + '/articulo/mostrarArticuloReceta?dpto=' + buscar_dpto + '&seccion=' + buscar_seccion;
        axios.get(url).then(function (response) {
            var respuesta = response.data;           
            me.arrayArt= respuesta.articulo;
            
          })
          .catch(function (error) {
            console.log(error);
          });
      },
       mostrarKitArticuloReceta(buscar_dpto,buscar_seccion,buscar_art){
        let me = this;

        var url = this.ruta + '/articulo/mostrarKitArticuloReceta?dpto=' + buscar_dpto + '&seccion=' + buscar_seccion+ '&art=' + buscar_art;
        axios.get(url).then(function (response) {
            var respuesta = response.data;           
            me.arrayKitArt= respuesta.kit;
            
          })
          .catch(function (error) {
            console.log(error);
          });
          return me.arrayKitArt;
      },

    mostrarDepartamentos(){
        let me = this;

        
        var url = this.ruta + '/articulo/mostrarDepartamento';
        axios.get(url).then(function (response) {
            var respuesta = response.data;           
            me.arrayDpto = respuesta.dpto;
            
          })
          .catch(function (error) {
            console.log(error);
          });
      },
      mostrarSecciones(buscar_dpto){
        let me = this;

        
        var url = this.ruta + '/articulo/mostrarSeccion?buscar=' + buscar_dpto;
        axios.get(url).then(function (response) {
            var respuesta = response.data;           
            me.arraySeccion = respuesta.seccion;
            
          })
          .catch(function (error) {
            console.log(error);
          });
      },

  },
  mounted() {
    this.mostrarDepartamentos();
  }
};
</script>