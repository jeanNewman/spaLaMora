<template>
  <div>
    <table class="table table-borderless table-striped table-sm">
      <thead>
        <tr>
          <th>Receta</th>
          <th>Medida</th>
          <th>Cant</th>
          <th>Costo</th>
          <th>Total</th>
          <th>Comentario</th>

        </tr>
      </thead>
      <tbody class="text-primary">
        <tr v-for="(kit,index) in arrayKitArt" :key="index">
          <td>{{kit.DESCRIPCIOKIT}}</td>
          <td>{{kit.MEDIDAKIT}}</td>
          <td>{{formatPrice(kit.UNIDADES)}}</td>
          <td>{{formatPrice(kit.PRECIO)}}</td>
          <td>{{formatPrice(kit.TOTAL)}}</td>
          <td>{{kit.COMENTARIO}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
 
  export default {
    
    props: ['ruta','codArticulo','dpto','seccion'],
    data() {
      return {
     

        arrayDpto: [],
        arraySeccion: [],
        arrayArt: [],
        arrayKitArt: [],
        arrayKit:[],
       
       i:0,
        buscar_art: "",
       
      };
    },
    created(){

     
         this.arrayKit.push(this.mostrarKitArticuloReceta(this.dpto,this.seccion,this.codArticulo))
       
    },
    methods: {

      formatPrice(value) {
        let val = (value / 1).toFixed(2);
        return val.toString();
      },

      mostrarKitArticuloReceta(buscar_dpto, buscar_seccion, buscar_art) {
        let me = this;

        var url = this.ruta + '/articulo/mostrarKitArticuloReceta?dpto=' + buscar_dpto + '&seccion=' + buscar_seccion +
          '&art=' + buscar_art;
        axios.get(url).then(function (response) {
            var respuesta = response.data;
            me.arrayKitArt = respuesta.kit;
            console.log(me.i++);

          })
          .catch(function (error) {
            console.log(error);
          });
          return this.arrayKitArt
       }
     

      

    },
    
  }
</script>