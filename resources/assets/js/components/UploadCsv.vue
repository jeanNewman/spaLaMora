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
          <i class="fa fa-align-justify"></i> Integracion Shopify
        </div>
        <!-- colocar aqui la busqueda con la tabla -->
       
         
        <div class="container">
           
            <section>
                
                <div class="row">
                    <div class="col-8 offset-2">
                        <h4 class="mb-4">Ingresar Archvo:</h4>
                        <vue-csv-import v-model="csv" 
                          :headers="true"
                          :showMatchFields="false"
                          :autoMatchFields="true"
                          :autoMatchIgnoreCase="true"
                       
                          :map-fields="mapFields"
                        ></vue-csv-import>
                        
                    </div>
                </div>
            </section>
            <div class="form-group row">
                            <div class="d-flex col-md-12">
                               
                                <button type="button" class="btn btn-sm btn-primary ml-auto"
                                    @click="checkCSV(csv)">Registrar Pedido</button>
                            </div>

                        </div>
            <div>
                           <BootstrapTable class="table table-borderless table-sm table-striped"
                                                   
                              :columns="fields" :data="csv" :options="options" :fixed="fixed">
                          </BootstrapTable>
                        </div>
        </div>
        <!-- colocar aqui la busqueda con la tabla -->  
      </div>
    </div>  
    <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal3}" role="dialog" aria-labelledby="myModalLabel"
            style="display: none;" aria-hidden="true">
            <vue-ellipse-progress :progress="progress"
                               
              :determinate="determinate"
              color="#7579ff"
              empty-color="transparent"
              :empty-color-fill="emptyColorFill"
              :size="180"
              :thickness="5"
              :empty-thickness="3"
              lineMode="out 5"
              :legend="false"
              animation="rs 700 1000"
              fontSize="1.5rem"
              :loading="loading"
              :no-data="noData">
              <img slot="legend-caption"
                      height="80px"
											:data-src="imagen"
											data-src-webp=""
											:src="imagen">              
              
            </vue-ellipse-progress>
            <!-- /.modal-dialog -->
        </div>
       
 </main>    
</template>

<script>
 import { VueCsvImport }  from 'vue-csv-import/src'
  import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.esm.js'
   import Swal from 'sweetalert2'


   
  export default {
   components:{
     VueCsvImport,
     BootstrapTable,
     Swal
  
   },
   
   
    props: ['ruta'],
    data() {
      return {
        imagen:"img/descarga.png",
        loading:true,
        noData:false,
        determinate:false,
        progress: 34,
      emptyColorFill: {
      radial: false,
      colors: [
        {
          color: "#754fc1",
          offset: "0",
          opacity: "0.3",
        },
        {
          color: "#366bfc",
          offset: "100",
          opacity: "0.3",
        },
      ],
    },
      modal3: 0,
      csv: [],
      mapFields:{ 
        id:'Id',
        name:'Name',
        email:'Email',
        financial_status:'Financial Status',
      /*   paid_at:'Paid at',
        fulfillment_status:'Fulfillment Status',
        fulfilled_at:'Fulfilled at',
        accepts_marketing:'Accepts Marketing',
        currency:'Currency', */
     //   subtotal:'Subtotal',
        shipping:'Shipping',
       // taxes:'Taxes',
        total:'Total',
         discount_code:'Discount Code',
        discount_amount:'Discount Amount',
       // shipping_method:'Shipping Method', */
        created_at:'Created at',
        lineitem_quantity:'Lineitem quantity',
        lineitem_name:'Lineitem name',
        lineitem_price:'Lineitem price',
        lineitem_sku:'Lineitem sku',
      /*   lineitem_compare_at_price:'Lineitem compare at price',
        
        lineitem_requires_shipping:'Lineitem requires shipping',
        lineitem_taxable:'Lineitem taxable',
        lineitem_fulfillment_status:'Lineitem fulfillment status', */
        billing_name:'Billing Name',
        billing_street:'Billing Street',
        billing_address1:'Billing Address1',
        billing_address2:'Billing Address2',
        billing_zip:'Billing Zip',
         billing_company:'Billing Company',
        billing_city:'Billing City',
        
       /* billing_province:'Billing Province',
        billing_country:'Billing Country', */
        billing_phone:'Billing Phone',
        shipping_name:'Shipping Name',
        shipping_street:'Shipping Street',
        shipping_address1:'Shipping Address1',
        shipping_address2:'Shipping Address2',
        shipping_zip:'Shipping Zip',
         shipping_company:'Shipping Company',
        shipping_city:'Shipping City',
        
      /*  shipping_province:'Shipping Province',
        shipping_country:'Shipping Country', */
        shipping_phone:'Shipping Phone',
        notes:'Notes',
        note_attributes:'Note Attributes',
       // cancelled_at:'Cancelled at',
        payment_method:'Payment Method',
        
       // refunded_amount:'Refunded Amount',
        vendor:'Vendor',
        payment_reference:'Payment Reference',
        
        tags:'Tags',
       /*  risk_level:'Risk Level',
        source:'Source',
        lineitem_discount:'Lineitem discount', */
        /* tax_1_name:'Tax 1 Name',
        tax_1_value:'Tax 1 Value',
        tax_2_name:'Tax 2 Name',
        tax_2_value:'Tax 2 Value',
        tax_3_name:'Tax 3 Name',
        tax_3_value:'Tax 3 Value',
        tax_4_name:'Tax 4 Name',
        tax_4_value:'Tax 4 Value',
        tax_5_name:'Tax 5 Name',
        tax_5_value:'Tax 5 Value', */
        phone:'Phone',
        receipt_number:'Receipt Number',
        
       
      },

      fields:[
        {field: 'id', title: 'Id'},
          {field: 'name', title: 'Name'},
          {field: 'email', title: 'Email'},
          {field: 'financial_status', title: 'Financial Status'},
         /*  {field: 'paid_at', title: 'Paid at'},
          {field: 'fulfillment_status', title: 'Fulfillment Status'},
          {field: 'fulfilled_at', title: 'Fulfilled at'},
          {field: 'accepts_marketing', title: 'Accepts Marketing'},
          {field: 'currency', title: 'Currency'}, */
      //    {field: 'subtotal', title: 'Subtotal'},
          {field: 'shipping', title: 'Shipping'},
       //   {field: 'taxes', title: 'Taxes'},
          {field: 'total', title: 'Total'},
          {field: 'discount_code', title: 'Discount Code'},
          {field: 'discount_amount', title: 'Discount Amount'},
      //    {field: 'shipping_method', title: 'Shipping Method'},
          {field: 'created_at', title: 'Created at'},
          {field: 'lineitem_quantity', title: 'Lineitem quantity'},
          {field: 'lineitem_name', title: 'Lineitem name'},
          {field: 'lineitem_price', title: 'Lineitem price'},
          {field: 'lineitem_sku', title: 'Lineitem sku'},
         /*  {field: 'lineitem_compare_at_price', title: 'Lineitem compare at price'},
          
          {field: 'lineitem_requires_shipping', title: 'Lineitem requires shipping'},
          {field: 'lineitem_taxable', title: 'Lineitem taxable'},
          {field: 'lineitem_fulfillment_status', title: 'Lineitem fulfillment status'}, */
          {field: 'billing_name', title: 'Billing Name'},
          {field: 'billing_street', title: 'Billing Street'},
          {field: 'billing_address1', title: 'Billing Address1'},
          {field: 'billing_address2', title: 'Billing Address2'},
          {field: 'billing_zip', title: 'Billing Zip'},
           {field: 'billing_company', title: 'Billing Company'},
          {field: 'billing_city', title: 'Billing City'},
          
          /*{field: 'billing_province', title: 'Billing Province'},
          {field: 'billing_country', title: 'Billing Country'}, */
          {field: 'billing_phone', title: 'Billing Phone'},
          {field: 'shipping_name', title: 'Shipping Name'},
          {field: 'shipping_street', title: 'Shipping Street'},
          {field: 'shipping_address1', title: 'Shipping Address1'},
          {field: 'shipping_address2', title: 'Shipping Address2'},
          {field: 'shipping_zip', title: 'Shipping Zip'},
          {field: 'shipping_company', title: 'Shipping Company'},
          {field: 'shipping_city', title: 'Shipping City'},
          
         /* {field: 'shipping_province', title: 'Shipping Province'},
          {field: 'shipping_country', title: 'Shipping Country'}, */
          {field: 'shipping_phone', title: 'Shipping Phone'},
          {field: 'notes', title: 'Notes'},
        //  {field: 'note_attributes', title: 'Note Attributes'},
         // {field: 'cancelled_at', title: 'Cancelled at'},
       //   {field: 'payment_method', title: 'Payment Method'},
          
         // {field: 'refunded_amount', title: 'Refunded Amount'},
          {field: 'vendor', title: 'Vendor'},
          {field: 'payment_reference', title: 'Payment Reference'},
          
        //  {field: 'tags', title: 'Tags'},
         /* {field: 'risk_level', title: 'Risk Level'},
          {field: 'source', title: 'Source'},
           {field: 'lineitem_discount', title: 'Lineitem discount'},
          {field: 'tax_1_name', title: 'Tax 1 Name'},
          {field: 'tax_1_value', title: 'Tax 1 Value'},
          {field: 'tax_2_name', title: 'Tax 2 Name'},
          {field: 'tax_2_value', title: 'Tax 2 Value'},
          {field: 'tax_3_name', title: 'Tax 3 Name'},
          {field: 'tax_3_value', title: 'Tax 3 Value'},
          {field: 'tax_4_name', title: 'Tax 4 Name'},
          {field: 'tax_4_value', title: 'Tax 4 Value'},
          {field: 'tax_5_name', title: 'Tax 5 Name'},
          {field: 'tax_5_value', title: 'Tax 5 Value'}, */
          {field: 'phone', title: 'Phone'},
          {field: 'receipt_number', title: 'Receipt Number'},

      ],
      options: {
                    search: false,
                    showColumns: false
                },
      
      arr :[],
        
      // Variables para datos de entrega a la pesona que va dirigida la entrega (a la persona qeu va dirigida o aquien se le regala)
        nombreClienteAdicional:'', // nombre_cliente : '',
        tlfClienteAdicional:'', //tlfCliente
        direccionClienteAdicional:'',//destino : '',
        
      //fin de datos de entrega

      // Variables para datos de la persona que hace el pedido
         idClientePedido :'', // clienteId : '',
         nombreClientePedido:'',// nombre : '',
         direccionClientePedido:'',// direccion : '',
         tlfClientePedido:'',
         emailClientePedido:'',// email : '',
         tipoDocClientePedido:'',
         numeroDocClientePedido:'',

      //

     /* //variables de articulos detalles
          idarticulo: "",
          articulo: "",
          precio: "",
          medida: "",
          comentario: "",
          adicional: '',
       */
      //variables de datos de pedido
          distrito : '',      
          formaPago : "",
          banco : "",
          deposito : "",        
          total : 0,
          observacion : '',
          idShopify:'',
          slot:'',
          cupon:'',
          despacho:'',
          

     // variables de renvio a principal 
          criterio:'estado',
          buscar:'',
          page:1,
     //     

      fixed:false,
      success: '',
      result :'',
      modalPedido:0,
      titulo:'Agregar Información Faltante',
      despachoChange:'',
      distritoChange:'',
      direccionClienteChange:'',
      nroShopifyChange:''

 
      };
    },

  methods: {

    async actualizarDatos(dato2,dato1){
         /* let me = this;
          me.despacho = me.despachoChange;
          me.distrito = me.distritoChange;
          me.distritoChange ='';
          me.despachoChange ='';
          me.modalPedido = 0;*/
          
               
        },

        
      async checkCSV(sepComa) {
        let me = this;
        let i = 1
        let split = ""
        let arrayDetalle = []
        let valor = 0

        // console.log(sepComa)
        let iterar = ""
        let comp = ""
        let comparar = ""
        me.modal3 = 1
        for (let x = 0; x < sepComa.length; x++) {
          if (sepComa[x].note_attributes !== "")
            comparar = sepComa[x].note_attributes

          if (x === 0) {

            agregarDetalle(sepComa[x], comparar)
            agregarCabecera(sepComa[x])
            i = 1;
            if (x + 1 === sepComa.length) {
              await me.registrarPersona()
              await me.registrarPedido(arrayDetalle)
            }
          } else if (sepComa[x].name === iterar && x > 0) {
            i++
            agregarDetalle(sepComa[x], comparar)
            if (x + 1 === sepComa.length) {
              await me.registrarPersona()
              await me.registrarPedido(arrayDetalle)

            }
          } else {
            i = 1
            await me.registrarPersona()
            await me.registrarPedido(arrayDetalle)

            arrayDetalle = []
            agregarDetalle(sepComa[x], comparar)
            agregarCabecera(sepComa[x])
            if (x + 1 === sepComa.length) {
              await me.registrarPersona()
              await me.registrarPedido(arrayDetalle)
            }
          }
          iterar = sepComa[x].name
          sepComa[x].receipt_number = i
          // console.log(sepComa[x]);

        };

           window.location.href = this.ruta + '/orden?page=' + this.page + '&buscar=' + this.buscar + '&criterio=' + this.criterio +
          '&buscar2=' + this.buscar + '&criterio2=' + this.criterio + '&buscar3=' + this.buscar + '&criterio3=' +
          this.criterio; 


        function devolverNoteAtributtes(element, buscar1, buscar2) {

          let dividir = ''
          let referencia = 0
          let split = ''

          if (element != '') {
            dividir = element.split(/[\n,]+/)
            referencia = element.indexOf(buscar1)
            if (referencia !== -1) {
              dividir.forEach((item, index) => {
                let posicion = item.indexOf(buscar2);
                if (posicion !== -1) {
                  split = dividir[index].split(': ');
                  split = split[1].trim();
                }

              })

            } else return ''

          } else return ''

          return split

        }

    
     
        function agregarDetalle(line, comparar) {

          let coment = ''

          coment = devolverNoteAtributtes(comparar, line.lineitem_sku, line.lineitem_sku)
          arrayDetalle.push({
            idarticulo: line.lineitem_sku !== "" ? line.lineitem_sku : "5555" ,
            articulo: line.lineitem_name,
            precio: line.lineitem_price,
            medida: "NIU",
            tipo: line.vendor,
            comentario: coment.replace(/["']/g, ""),
            cantidad: line.lineitem_quantity,
            adicional: '',
            configuracion:''


          });

          if (line.shipping > 0) {
            arrayDetalle.push({
              idarticulo: '4462',
              articulo: 'DELIVERY',
              precio: line.shipping,
              medida: "NIU",
              tipo: 'NA',
              comentario: '',
              cantidad: 1,
              adicional: '',
              configuracion:''


            });
          }

        }

    function agregarCabecera(element) {

          // datos de cliente
           let nombreClientePrincipal = ''; //nombre
           let direccionClientePrincipal = ''; //direccionShipping
           let tlfClientePrincipal= ''; //tlf
           let emailClientePrincipal = '';
         
         // datos de cliente adicional
           let nombreClienteAdicional = ''; // nombreCliente
           let direccionClienteAdicional =''; //direcionBilling
           let tlfClienteAdicional ='';

          let split = '';
          let dia = ''
         
         
          let zona = "MIRAFLORES"
          let dividir = ""
          let delivery = 'Checkout-Method: delivery'
          let pikup = 'Checkout-Method: pickup'
          let termino1 = "Pickup-Date"
          let termino2 = "Pickup-Location-Company"
          let termino3 = "Delivery-Date"
          let termino4 = "Pickup-Time"
          let termino5 = "Delivery-Time"
          let timeSlot =""
          let findTime = ""
          let esDocumento=""
          let informacion =""
          let despacho = ""
         
          let dniruc =""
         
          let referencia = ""
          let comparar = element.note_attributes
          let valor = 0

         
         nombreClientePrincipal = element.shipping_name;
         direccionClientePrincipal = element.shipping_street + " " + element.shipping_address1 + " " + element.shipping_address2+" "+ element.shipping_city
         emailClientePrincipal = element.email;

         nombreClienteAdicional = element.billing_name;
         direccionClienteAdicional = element.billing_street + " " + element.billing_address1 + " " + element.billing_address2+" "+ element.billing_city
          tlfClientePrincipal = element.shipping_phone;
           tlfClienteAdicional = element.billing_phone;
        
         if(element.shipping_phone === "" && element.billing_phone==="" && element.phone !== ""){
            tlfClientePrincipal = element.phone;
           tlfClienteAdicional = element.phone;
         }
            
             
          


          dia = me.$moment(new Date()).format("DD-MM-YYYY")
          // split = dia.toString();
          despacho = devolverNoteAtributtes(comparar, 'despacho', 'despacho')
          split = devolverNoteAtributtes(comparar, pikup, termino1)
          if (split !== '') {
            findTime = devolverNoteAtributtes(comparar,pikup,termino4);
            const ini = me.$moment(findTime, "hh:mm A").format("HH:mm");
            const fin = me.$moment("02:00 PM", "hh:mm A").format("HH:mm");
            timeSlot = ini>=fin?'2:00 PM - 6:00 PM': '10:00 AM - 2:00 PM';
             
           
            zona = devolverNoteAtributtes(comparar, pikup, termino2)
            if ('MIRAFLORES' === zona.trim().toUpperCase()) {
              zona = "RECOGER EN GALVEZ";
              despacho = 'GALVEZ';
            } else if ('SURCO' === zona.trim().toUpperCase()) {
              zona = "RECOGER EN SURCO";
              despacho = "SURCO";
            } else if ('CHORRILLOS' === zona.trim().toUpperCase()) {
              zona = "RECOGER EN CHORRILLOS";
              despacho = "CHORRILLOS";
            }else {
              zona = "RECOGER SAN ISIDRO";
              despacho = "SI";
            }
          } else {
            split = devolverNoteAtributtes(comparar, delivery, termino3)
            timeSlot = devolverNoteAtributtes(comparar,delivery,termino5)
            if(timeSlot === '2:00 PM - 8:00 PM'){
              timeSlot = '2:00 PM - 6:00 PM'
            }
             if(timeSlot === '10:00 AM - 1:00 PM'){
              timeSlot = '10:00 AM - 2:00 PM'
            }
            zona = devolverNoteAtributtes(comparar, 'MUNICIPIO', 'MUNICIPIO')
           
                  if (zona === 'SURCO' || zona ===  'LA MOLINA' || zona ===  'SANTA ANITA' || zona ===  'ATE' || zona ===  'SAN LUIS')
                      despacho = 'SURCO';
                  else if(zona === 'CHORRILLOS') 
                     despacho = 'CHORRILLOS';
                  else despacho = 'SI';
            
          } 
          if (zona === '') {
            
           zona='NA';
           despacho = 'NA';
            
          }
          if (split === '') {
            split = dia.toString();
          }

          if(isNaN(element.shipping_company)){
              esDocumento = 'NA';
          }else{
            dniruc = element.shipping_company;
             informacion = dniruc.length>11? informacion + 'Verificar el Ruc Tiene mas de 11 dígitos':''
             informacion = dniruc.length<6 && dniruc.length>0?informacion + 'Verificar el Dni o Ruc Tiene menos de 6 dígitos':''
             esDocumento = (dniruc.substr(0,2) == '10' || dniruc.substr(0,2) == '20')?'RUC':'DNI'
            

          }
          
          me.nombreClientePedido = nombreClientePrincipal;
          me.direccionClientePedido = direccionClientePrincipal.replace(/["']/g, "");;
          me.tlfClientePedido = tlfClientePrincipal;
          me.emailClientePedido = emailClientePrincipal;
          me.tipoDocClientePedido = esDocumento;
          me.numeroDocClientePedido = dniruc;
          me.nombreClienteAdicional = nombreClienteAdicional;
          me.direccionClienteAdicional = direccionClienteAdicional.replace(/["']/g, "");
          me.tlfClienteAdicional = tlfClienteAdicional;
          me.cupon = element.discount_code === ''?'':` - CUPON: ${element.discount_code}`;      
          me.distrito = zona;
          me.formaPago = element.payment_method==='custom'?'YAPE':element.payment_method;
          me.banco = element.payment_method==='custom'?'YAPE':element.payment_method;
          me.idShopify = element.name.replace(/#/g, "H");
          me.deposito = element.payment_reference === "" ? "NA" : element.payment_reference;
          me.total = element.total;
          me.observacion = element.notes.replace(/["']/g, "") + " - "+ informacion;
          me.fecha_entrega = split;
          me.slot = timeSlot;
          me.despacho = despacho;

        }

      },


      async registrarPersona() {
        let me = this
        try {
          let response = await axios.post(me.ruta + '/cliente/registrar', {
            'nombre': me.nombreClientePedido,
            'tipo_documento': 'NA',
            'num_documento': '',
            'id_juntos': '',
            'direccion': me.direccionClientePedido,
            'telefono': me.tlfClientePedido.replace(/\s+/g, ''),
            'email': me.emailClientePedido
          })
          if (response.status === 200) {
            if(response.data.errorValid === 'undefined')
              me.idClientePedido = response.data.last_insert_id;
            else  {
              me.idClientePedido = response.data.last_insert_id;
              try {
                let response1 = await axios.put(`${me.ruta}/cliente/updateEspecial`,{
                  'id':me.idClientePedido,
                  'direccion': me.direccionClientePedido,
                  'telefono': me.tlfClientePedido.replace(/\s+/g, ''),
                  'email': me.emailClientePedido
                })
               if(response.status===200){
                 console.log('actualizado');
               } 
              } catch (error) {

                console.log(error)

              }
            }
          }
          me.nombreClientePedido = '';
          me.direccionClientePedido = '';
          me.tlfClientePedido = '';
          me.emailClientePedido = '';
        
        } catch (error) {

          console.log(error)

        };

      },


      async registrarPedido(detalle) {
        let me = this;
        let zona ='';
        let despacho='';
        if(me.distrito === 'NA' && me.despacho == 'NA'){
                      const {
                        value: okComment
                    } = await Swal.fire({
                        title: 'Agregue el Distrito',
                         html:`<ul style="list-style:none;">
                                 <li>Pedido Shopify: ${me.idShopify}}</li>
                                 <li>Dirección de Envio: ${me.direccionClienteAdicional}}</li>
                                 
                               </ul>`,
                        input: 'select',
                        inputOptions: {
                           
                              "ATE":"ATE",
                              "BARRANCO":"BARRANCO",
                              "BREÑA":"BREÑA",
                              "CHORRILLOS":"CHORRILLOS",
                              "COMAS":"COMAS",
                              "INDEPENDENCIA":"INDEPENDENCIA",
                              "JESUS MARIA":"JESUS MARIA",
                              "LA MOLINA":"LA MOLINA",
                              "LA VICTORIA":"LA VICTORIA",
                              "LINCE":"LINCE",
                              "LOS OLIVOS":"LOS OLIVOS",
                              "MAGDALENA":"MAGDALENA",
                              "MIRAFLORES":"MIRAFLORES",
                              "PUEBLO LIBRE":"PUEBLO LIBRE",
                              "RECOGER EN GALVEZ":"RECOGER EN GALVEZ",
                              "RECOGER EN SURCO":"RECOGER EN SURCO",
                              "RECOGER SAN ISIDRO":"RECOGER SAN ISIDRO",
                              "RECOGER SAN CHORRILLOS":"RECOGER SAN CHORRILLOS",
                              "RIMAC":"RIMAC",
                              "SJL":"SJL",
                              "SJM":"SJM",
                              "SAN BORJA":"SAN BORJA",
                              "SAN ISIDRO":"SAN ISIDRO",
                              "SAN LUIS":"SAN LUIS",
                              "SAN MIGUEL":"SAN MIGUEL",
                              "SMP":"SMP",
                              "SURCO":"SURCO",
                              "SURQUILLO":"SURQUILLO",
                              "TAXI":"TAXI"
                             
                        },
                        focusConfirm: false,                       
                          inputPlaceholder: 'Distrito',
                             showCancelButton: true,

                            inputValidator: (value) => {
                                if (!value) {
                                return 'Debes Colocar algo!!'
                                }
                            },
                        confirmButtonText: 'Guardar',
                      
                    
                    })
                     if (okComment) {
                          
                          zona = okComment;
                          if (zona === 'SURCO' || zona ===  'LA MOLINA' || zona ===  'SANTA ANITA' || zona ===  'ATE' || zona ===  'SAN LUIS' || zona ===  'RECOGER EN SURCO' )
                              despacho = 'SURCO';
                          else if(zona === 'CHORRILLOS') 
                            despacho = 'CHORRILLOS';
                          else if(zona === 'RECOGER EN GALVEZ') 
                            despacho = 'GALVEZ';  
                          else despacho = 'SI';

                          me.distrito = zona;
                          me.despacho = despacho
                     }
        }

        
        try {
          let response = await axios.post(me.ruta + '/orden/registrar', {
            'idCliente': me.idClientePedido,
            'nombre_cliente': me.nombreClienteAdicional,
            'telefono': me.tlfClienteAdicional.replace(/\s+/g, ''),
            'destino': me.direccionClienteAdicional,
            'distrito': me.distrito,
            'despacho' : me.despacho,
            'deposito': me.deposito,
            'fecha_entrega': me.fecha_entrega,
            'total': me.total,
            'formaPago': me.formaPago,
            'banco': me.banco,
            'existe': 1,
            'observacion': me.observacion + me.cupon,
            'idShopify': me.idShopify,
            'slot':me.slot,
            'data': detalle

          })

          me.idClientePedido = '';
          me.nombreClienteAdicional = '';
          me.tlfClienteAdicional = '';
          me.destino = '';
          me.distrito = '';  
          me.despacho ='';           
          me.formaPago = "";
          me.banco = "";
          me.deposito = "";         
          me.total = 0;
          me.observacion = '';      
          me.slot='';
          me.idShopify = '';
          me.cupon = '';
          detalle = [];


        } catch (error) {

          console.log(error);
        }
      }

    },


  }
</script>

<style>
  .mostrar {
        display: block !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
        overflow-y: auto;
       
  margin: 1rem;
  padding: 1rem;
 
  /* IMPORTANTE */
  text-align: center;
  
    }

     .modal-content {
        width: 100% !important;
        position: absolute !important;
        margin-top: 10%;
    }

    .mostrar-pedido {
        display: block !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
        overflow-y: auto;

    }

    .modal-dialog {
        overflow-y: initial !important
    }

    .div-error {
        display: flex;
        justify-content: center;
    }

    .text-error {
        color: red !important;
        font-weight: bold;
    }

    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }
</style>