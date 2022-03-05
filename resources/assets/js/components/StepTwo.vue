<template>
<vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"
  v-on:vdropzone-success="init" >
</vue-dropzone>

</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
	components: {
		vueDropzone: vue2Dropzone
	},
	
	data(){
		return {

     
          dropzoneOptions: {
          thumbnailWidth: 150,
          maxFilesize: 5,
          addRemoveLinks: false,
          paramName: "image",
          url: "https://api.imgur.com/3/image", 
          
          headers: {  'Authorization': 'Client-ID 4cdb98d6cd678ff',
                      'Cache-Control': null,
                      'X-Requested-With': null
                      }
      }
    }
  },
  	methods:{

       init: function(file, res) {
          console.log(file);
          console.log(res.data.link);
          console.log(this.datos);
         // this.show_link(res.data.link)
        // saveToDB(res.data.id, res.data.link);
        },
        
    
        show_link(link){
            document.getElementById('hide').style.display = 'block';
            var image_list = document.getElementById("image_list");
            var aTag = document.createElement('a');
            aTag.setAttribute('href', link);
            aTag.innerHTML = link;
            image_list.appendChild(aTag);
            var lineBreak = document.createElement('br');
            image_list.appendChild(lineBreak);
          },

          hide_link(){
            document.getElementById('hide').style.display = 'none';
          },
    }
}
</script>

<style>

</style>