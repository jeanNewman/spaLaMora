<template>
  <main class="main">
    <!-- yape pago -->
    <section class="section">
      <div class="container ">
        <div class="header-container-wrapper">
          <div class="header-container">
            <div class="custom-header-bg">
              <div class="page-center">
                <div class="logo">La Mora Patelería</div>
              <!--   <div class="navigation">
                  <ul>
                    <li><a href="#" class="button click-upload"><i class="fa fa-cloud-upload"
                          aria-hidden="true"></i>Upload</a></li>
                    <li><a href="#" class="button open-progress"><i class="fa fa-tasks"
                          aria-hidden="true"></i>Progress</a></li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        <div class="body-container-wrapper">
          <div class="body-container">
            <div class="page-center">

              <i class="fa fa-cloud" aria-hidden="true"></i>
              <h1>Sube tu pago de <strong>YAPE</strong></h1>
              <a class="upload" @click="mostrarItem()" id="call-to-action"><span>Selecciona la Imagen</span></a>
             <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"
                v-on:vdropzone-success="init" >
              </vue-dropzone>
         
              <div class="file-upload-bar-closed"></div>
            </div>
          </div>
        </div>

        <div class="footer-container-wrapper">
          <div class="footer-container">
            <div class="custom-footer-bg">
              <div class="page-center">
                <p>@Copyright Qbus</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
 

    import Swal from 'sweetalert2'
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
      components: {
        vueDropzone: vue2Dropzone,
        Swal        
      },
        props: ['datos'],
        data(){
          return {
              
            yapeImgPago:'',
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
        methods: {
            // Executed when @completed-step event is triggered

              async verificarDatos(img){
                
                let codigo='';
                  let total =0;
                  let fechaCompra = '';
                  let splitInfo = '';
                  let cliente = '';
                  let fechaInfo = '';
                  let buscaInfo ='';
                  let buscaPrecio ='';
                  let precio ='';
                  let error = 0;
                  let msgErr = ''
                  this.$moment.locale('es');
              
                 let url = 'http://lamorapedidos.tk/public/yape/revisarImagen'
                    try{
                       let response = await axios.get(url,{
                         params: {
                            'img':img
                         }
                       });
                        let respuesta = response.data.ParsedResults[0].ParsedText;
                     console.log(respuesta);
                        console.log("--------------------------------------");
                        buscaInfo=  this.devolverTexto(respuesta,'PVS INVERSIONES S.A.C.','PVS INVERSIONES S.A.C.');
                        buscaPrecio=  this.devolverTexto(respuesta,'Has yapeado','Has yapeado');
                        if(buscaInfo !== '' && buscaPrecio!== ''){
                          codigo = buscaInfo[1].replace(/["-/ :]/g,"");
                          splitInfo = buscaInfo[1].split(/[ ]/g);
                          fechaCompra = this.$moment(splitInfo[1].trim(),'DD/MM/YYYY','America/Lima').format('DD-MM-YYYY');
                          fechaInfo = buscaInfo[1];
                          cliente = buscaInfo[2];
                          precio =  buscaPrecio[1].trim();
                          codigo = codigo + precio;
                          console.log(`codigo ${codigo}`);
                          console.log(`fecha compra ${fechaCompra}`);
                          console.log(`fecha info ${fechaInfo}`);
                          console.log(`cliente ${cliente}`);
                          console.log(`precio ${precio}`);
                        }else{
                          error = 1
                          msgErr = `Este Archivo con corresponde con una imagen de pago de YAPE, 
                                    intente de nuevo, si tiene algun problema contacte a nuestros operadores`;
                        }
                        if(error === 0){
                          codigo = codigo + precio;
                          total = parseFloat(precio);
                        } else {
                          console.log('hay error')
                              Swal.fire({
                                  title: 'ooPSS!!',
                                  html: msgErr,
                                  imageUrl: 'img/logo.png',
                                  imageWidth: 400,
                                  imageHeight: 200,
                                  imageAlt: 'Custom image',
                                  })
                        }                       
                        
                    } catch (error) {
                      console.log(error);
                    }  
                    
              },

               init: function(file, res) {
                let me = this;
                console.log(file);
               // console.log(res);
             
                me.verificarDatos(res.data.link);

               // me.yapeImgPago = res.data.link;
               
               
                //this.show_link(res.data.link)
              // saveToDB(res.data.id, res.data.link);
              },

               devolverTexto(element, buscar1, buscar2) {

                      let dividir = ''
                      let referencia = 0
                      let split = ''
                      let cabecera=[]

                      if (element != '') {
                        dividir = element.split(/[\n,]+/)
                        referencia = element.indexOf(buscar1)
                        if (referencia !== -1) {
                          dividir.forEach((item, index, arr) => {
                            let posicion = item.indexOf(buscar2);
                            if (posicion !== -1) {
                              for (let i=0; i<3;i++){
                               cabecera[i] = arr[index];
                               index++
                              }  
                            }

                          })

                        } else return ''

                      } else return ''

                      return cabecera

              },
              
              async mostrarItem(){
                let me = this;  
                
                var url = 'http://lamorapedidos.tk/public/yape/revisarShopify?id=' + me.datos.nro_orden + '&img='+ me.yapeImgPago;
                    try{
                       let response =await axios.get(url);
                        let respuesta = response.data[0].order;
                        console.log(respuesta);
                    } catch (error) {
                      console.log(error);
                    }  
              },

              async subirYape(){

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
           
        },
        mounted(){
            let me = this;
            Swal.fire({
                title: 'Yapea con La Mora Pastelería',
                html: `<p>Gracias Sr(a). <strong><span style="color: #2d57c1;">${me.datos.cliente}</span></strong></p>
                       <p>Puede usar las opciones 1 y 2 de la guia para aprender a yapear a nuestras cuenta, si ya sabe como hacerlo, 
                         puede ir directamente a la opción 3 y hacer poder preparar y despachar 
                         su pedido Nro <strong><span style="color: #2dc22f;">${me.datos.nro_orden}</span></strong></p>`,
                imageUrl: 'img/logo.png',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                })

              
        }
    }
  
</script>
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
@-webkit-keyframes animation-rotate {
  100% {
    -webkit-transform: rotate(360deg);
  }
}

@-moz-keyframes animation-rotate {
  100% {
    -moz-transform: rotate(360deg);
  }
}

@-o-keyframes animation-rotate {
  100% {
    -o-transform: rotate(360deg);
  }
}

@keyframes animation-rotate {
  100% {
    transform: rotate(360deg);
  }
}

html {
  height: 100%;
}

body {
  display: flex;
  flex-direction: column;
  font-family: 'Raleway', sans-serif;
  transform: translateX(0%);
  height: 100%;
  width: 100%;
  transition: transform 0.2s linear;
  user-select:none;
  -webkit-user-select:none;
  -moz-user-select:none;
  -o-user-select:none;
}
body.file-process-open {
  transform: translateX(-30%);
  transition: transform 0.2s linear;
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

a {
  text-decoration: none;
}

h1 {
  font-family: 'Open Sans', sans-serif;
  font-weight: 100;
  letter-spacing: 0px;
  font-size: 40px;
  line-height: 1.2;
}

.header-container .page-center,
.body-container .page-center,
.footer-container .page-center {
  max-width: 1300px;
  margin: 0 auto;
  padding: 0 20px;
  overflow: hidden;
}
.button i {
    margin-right: 8px;
}
.header-container-wrapper {
  flex: 0 0 auto;
}
.body-container-wrapper {
  flex: 1 0 auto;
}
.footer-container-wrapper {
  flex: 0 0 auto;
}
.body-container-wrapper .page-center {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  height: calc(100vh - 170px);
}
.body-container i.fa.fa-cloud {
    font-size: 100px;
    color: #2196f3;
    text-shadow: 0 0 5px rgba(0, 0, 0, 0.48);
}
.custom-header-bg {
    background: #2196F3;
    padding: 20px 0;
    font-family: 'Open Sans', sans-serif;
    box-shadow: 0 0 12px #000;
}
.custom-footer-bg {
  background: #2196f3;
  padding: 20px;
  text-align: center;
  color: #fff;
  box-shadow: 0 0 12px #000;
}
.logo {
  width: 30%;
  float: left;
  font-size: 24px;
  color: #ffffff;
  font-weight: 100;
  cursor: pointer;
  margin-top: 4px;
}

.navigation {
  float: right;
  width: 70%;
}

.navigation ul {
  margin: 0;
  padding: 0;
  list-style: none;
  display: block;
  float: right;
}

.navigation ul li {
  display: inline-block;
}

.button {
  white-space: nowrap;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  padding: 0 30px;
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
  background: #fff;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .025em;
  color: #555;
  text-decoration: none;
  -webkit-transition: all .15s ease;
  transition: all .15s ease;
  font-family: 'Open Sans', sans-serif;
  font-weight: 400;
}

.button:hover {
  color: #6e6e6e;
  transform: translateY(-1px);
  box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
}

.button:active {
  color: #555;
  background-color: #f6f9ff;
  transform: translateY(1px);
  box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}

.upload {
  padding: 0;
  background-color: #3498db;
  background-image: 8121991;
  background-image: -webkit-linear-gradient(#4aa3df 0%, #258cd1 100%);
  background-image: -moz-linear-gradient(#4aa3df 0%, #258cd1 100%);
  background-image: -o-linear-gradient(#4aa3df 0%, #258cd1 100%);
  background-image: linear-gradient(#4aa3df 0%, #258cd1 100%);
  -webkit-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(52, 152, 219, 0.5) 0 0 5px;
  -moz-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(52, 152, 219, 0.5) 0 0 5px;
  box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(52, 152, 219, 0.5) 0 0 5px;
  -webkit-border-radius: 4px;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 4px;
  -moz-background-clip: padding;
  border-radius: 4px;
  background-clip: padding-box;
  padding: 20px 20px;
  color: #fff;
  cursor: pointer;
  font-weight: 600;
  font-family: Open Sans;
}

.upload span {
  text-shadow: rgba(29, 111, 165, 0.9) 0 0 2px;
}

.upload span {
  padding: 20px 25px;
  font: 700 13px Montserrat, Helvetica, Arial, sans-serif;
  text-transform: uppercase;
  color: #fff;
  -webkit-transition: all 350ms ease;
  -moz-transition: all 350ms ease;
  -o-transition: all 350ms ease;
  transition: all 350ms ease;
}

.upload:hover {
  background-color: #4aa3df;
  background-image: 8121991;
  background-image: -webkit-linear-gradient(#5faee3 0%, #3498db 100%);
  background-image: -moz-linear-gradient(#5faee3 0%, #3498db 100%);
  background-image: -o-linear-gradient(#5faee3 0%, #3498db 100%);
  background-image: linear-gradient(#5faee3 0%, #3498db 100%);
  -webkit-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(74, 163, 223, 0.5) 0 0 5px;
  -moz-box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(74, 163, 223, 0.5) 0 0 5px;
  box-shadow: inset rgba(0, 0, 0, 0.2) 0 0 0 1px, rgba(74, 163, 223, 0.5) 0 0 5px;
}

.upload:hover span {
  text-shadow: rgba(33, 125, 187, 0.9) 0 0 2px;
}

.upload:active {
  background-color: #258cd1;
  background-image: 8121991;
  background-image: -webkit-linear-gradient(#258cd1 0%, #258cd1 100%);
  background-image: -moz-linear-gradient(#258cd1 0%, #258cd1 100%);
  background-image: -o-linear-gradient(#258cd1 0%, #258cd1 100%);
  background-image: linear-gradient(#258cd1 0%, #258cd1 100%);
}

.upload--loading {
  background-color: #258cd1 !important;
  background-image: 8121991 !important;
  background-image: -webkit-linear-gradient(#258cd1 0%, #258cd1 100%) !important;
  background-image: -moz-linear-gradient(#258cd1 0%, #258cd1 100%) !important;
  background-image: -o-linear-gradient(#258cd1 0%, #258cd1 100%) !important;
  background-image: linear-gradient(#258cd1 0%, #258cd1 100%) !important;
  position: relative;
  cursor: wait;
}

.upload--loading:before {
  margin: -13px 0 0 -13px;
  width: 24px;
  height: 24px;
  position: absolute;
  left: 50%;
  top: 50%;
  content: '';
  -webkit-border-radius: 24px;
  -webkit-background-clip: padding-box;
  -moz-border-radius: 24px;
  -moz-background-clip: padding;
  border-radius: 24px;
  background-clip: padding-box;
  border: rgba(255, 255, 255, 0.25) 2px solid;
  border-top-color: #ffffff;
  -webkit-animation: animation-rotate 750ms linear infinite;
  -moz-animation: animation-rotate 750ms linear infinite;
  -o-animation: animation-rotate 750ms linear infinite;
  animation: animation-rotate 750ms linear infinite;
}

.upload--loading span,
.upload--loading:hover span,
.upload--loading:active span {
  color: transparent;
  text-shadow: none;
}

.upload-hidden {
  visibility: hidden;
}
.upload {
    position: relative;
    overflow: hidden;
}
.upload:after {
  content: "";
  position: absolute;
  top: -110%;
  left: -210%;
  width: 200%;
  height: 200%;
  opacity: 0;
  transform: rotate(30deg);
  background: rgba(255, 255, 255, 0.13);
  background: linear-gradient(
    to right, 
    rgba(255, 255, 255, 0.13) 0%,
    rgba(255, 255, 255, 0.13) 77%,
    rgba(255, 255, 255, 0.5) 92%,
    rgba(255, 255, 255, 0.0) 100%
  );
}
.upload:hover:after {
  opacity: 1;
  top: -30%;
  left: 100%;
  transition-property: left, top, opacity;
  transition-duration: 0.7s, 0.7s, 0.15s;
  transition-timing-function: ease;
}
.upload:active:after {
  opacity: 0;
}
.file-upload-bar {
  height: 100%;
  position: fixed;
  right: -30%;
  width: 30%;
  top: 0;
  background: #2196f3;
  box-shadow: 0 0 22px #000;
  overflow: hidden;
  display: block;
  transition: all 0.2s linear;
}
.individual-files ul li:last-child {
    border: 0;
}
.file-process-open .file-upload-bar {
  right: 0;
  transition: all 0.2s linear;
  transform: translateX(100%);
}

.file-upload-bar-closed {
  position: fixed;
  right: -100%;
  height: 100vh;
  width: 70%;
  top: 0;
  cursor: pointer;
  transition: all 0.2s linear;
  z-index: 9999;
  transform: translateX(-30%);
}

.file-process-open .file-upload-bar-closed {
  transition: all 0.2s linear;
  transform: translateX(0%);
  right: 0;
  left: auto;
}
.bar-wrapper {
    padding: 20px;
}
.overall span {
    color: #fff;
    font-size: 20px;
    line-height: 1.2;
    font-weight: 300;
    background: #2196f3;
    display: inline-block;
    overflow: hidden;
    z-index: 9;
    position: relative;
    padding-right: 10px;
}
.overall {
    position: relative;
}
.overall:before {
    content: "";
    border-top: 2px solid #fff;
    height: 1px;
    width: 100%;
    position: absolute;
    top: 12px;
}
.progress-bar-overall {
    width: 100%;
    background: #fff;
    margin-top: 15px;
    height: 8px;
    transition: all 0.3s linear;
}
.progress-bar-overall span {
    background: #fff;
    color: #2196f3;
    padding: 5px 15px;
    transition: all 0.3s linear;
    position: relative;
    left: 10%;
    font-weight: bold;
    font-size: 15px;
    top: 8px;
    cursor: pointer;
    text-align: center;
}
.individual-files {
    border: 1px solid #fff;
    margin-top: 55px;
    padding: 0;
}
.individual-files ul {
    padding: 0;
    margin: 0;
    list-style: none;
}
.individual-files ul li span {
    display: block;
    margin-bottom: 10px;
    font-family: 'Open Sans', sans-serif;
    font-size: 13px;
}
.individual-files ul {
    height: calc(100vh - 160px);
    overflow-y: scroll;
    background: rgba(255,255,255,1);
    background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
    background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
    background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
    background: -o-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
    background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
    background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );
}
.individual-files ul li {
    padding: 10px;
    border-bottom: 1px solid #2196f3;
}
.individual-files ul li span i {
    font-style: normal;
    font-weight: bold;
    width: 80px;
    display: inline-block;
}
.individual-files ul li span b {
    font-weight: normal;
}
span.file-link input {
    padding: 5px 10px;
    border: none;
    background: transparent;
    outline: 0;
    padding-left: 0;
}
.copy-link b {
    background: #2196f3;
    padding: 5px 10px;
    display: inline-block;
    margin-left: 80px !important;
    cursor: pointer;
    color: #fff;
}
.copy-link b:active {
    background-color: rgba(33, 150, 243, 0.9);
    transform: translateY(1px);
    box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
}
@media (max-width:700px) {
  .custom-header-bg {
    text-align: center;
  }
  .logo {
    width: 100%;
    float: none;
    margin-bottom: 20px;
  }
  .navigation ul{
    float:none;
    text-align:center;
  }
  .navigation ul li + li {
    margin-top: 10px;
  }
  .navigation {
    float: none;
    width: 100%;
  }
}



</style>