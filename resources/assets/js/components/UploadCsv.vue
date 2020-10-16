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


   
  export default {
   components:{
     VueCsvImport,
     BootstrapTable,
  
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
      /*   discount_code:'Discount Code',
        discount_amount:'Discount Amount',
        shipping_method:'Shipping Method', */
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
        //  {field: 'discount_code', title: 'Discount Code'},
       //   {field: 'discount_amount', title: 'Discount Amount'},
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
      fixed:false,
      idarticulo: "",
      articulo: "",
      precio: "",
      medida: "",
      tipo: "",
      comentario: "",
      cantidad: "",
      adicional: '',
      nombre_cliente : '',
      telefono : '',
      tlfCliente:'',
      destino : '',
      distrito : '',
      movilidad : '',
      orden_entrega : '',
      formaPago : "",
      banco : "",
      deposito : "",
      importe_total : '',
      total : 0,
      observacion : '',
      tipo : "",
      cantidad : 0,
      codigo : '',
       nombre : '',
      tipo_documento : 'DNI',
      num_documento : '',
      idJuntos :'',
      direccion : '',
     
      email : '',
      errorPersona : 0,
      clienteId : '',
      success: '',
      result :'',
      zip_shipping :'',
      zip_billing:'',
      servicio : '',
      idShopify:'',
      criterio:'estado',
      buscar:'',
      slot:'',
      page:1

      };
    },

  methods: {

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
            idarticulo: line.lineitem_sku,
            articulo: line.lineitem_name,
            precio: line.lineitem_price,
            medida: "NIU",
            tipo: line.vendor,
            comentario: coment.replace(/["']/g, ""),
            cantidad: line.lineitem_quantity,
            adicional: ''


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
              adicional: ''


            });
          }

        }

        function agregarCabecera(element) {

          let split = '';
          let dia = ''
          let direccionShipping = ''
          let direccionBilling = ''
          let nombreCliente = ''
          let tlf = ''
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
          let esDocumento=""
          let informacion =""
          let coinciden = 0
          let dniruc =""
         
          let referencia = ""
          let comparar = element.note_attributes
          let valor = 0

          direccionShipping = element.shipping_street + " " + element.shipping_address1 + " " + element.shipping_address2+" "+ element.shipping_city
          direccionBilling = element.billing_street + " " + element.billing_address1 + " " + element.billing_address2+" "+ element.billing_city
          if (element.shipping_phone !== "") {
            if (element.billing_phone !== "" && element.billing_phone === element.shipping_phone)
              tlf = element.billing_phone
            else
              tlf = element.shipping_phone
          } else if (element.phone !== "") {
            tlf = element.phone
          } else tlf = "VERIFICAR"

          if (direccionShipping === direccionBilling) {
            direccionShipping = ""
            nombreCliente = ""
            coinciden = 1

          } else {
            nombreCliente = element.shipping_name

          }

          dia = me.$moment(new Date()).format("DD-MM-YYYY")
          // split = dia.toString();
          split = devolverNoteAtributtes(comparar, pikup, termino1)
          if (split !== '') {
            timeSlot = devolverNoteAtributtes(comparar,pikup,termino4);
            zona = devolverNoteAtributtes(comparar, pikup, termino2)
            if ('MIRAFLORES' === zona.trim().toUpperCase()) {
              zona = "RECOGER EN GALVEZ";
            } else if ('SURCO' === zona.trim().toUpperCase()) {
              zona = "RECOGER EN SURCO";
            } else {
              zona = "RECOGER SAN ISIDRO";
            }
          } else {
            split = devolverNoteAtributtes(comparar, delivery, termino3)
            timeSlot = devolverNoteAtributtes(comparar,delivery,termino5)
            zona = devolverNoteAtributtes(comparar, 'MUNICIPIO', 'MUNICIPIO')
          }
          if (zona === '') {
            zona = "RECOGER SAN ISIDRO"
          }
          if (split === '') {
            split = dia.toString();
          }

          if(isNaN(element.billing_company)){
              informacion = coinciden==0?"No coloco DNI o RUC REVISAR":'';
          }else{
            dniruc = element.billing_company
             informacion = dniruc.length>11? informacion + 'Verificar el Ruc Tiene mas de 11 dígitos':''
             informacion = dniruc.length<6 && dniruc.length>0?informacion + 'Verificar el Dni o Ruc Tiene menos de 6 dígitos':''
             esDocumento = (dniruc.substr(0,2) == '10' || dniruc.substr(0,2) == '20')?'RUC':'DNI'
            

          }
          
          me.nombre = element.billing_name
          me.tipo_documento = esDocumento;
          me.num_documento = isNaN(element.billing_company) ? '' : element.billing_company;
          me.idJuntos = '';
          me.direccion = direccionBilling.replace(/["']/g, "");
          me.email = element.email;
          me.errorPersona = 0;
          me.nombre_cliente = nombreCliente;
          me.telefono = tlf;
          me.tlfCliente = tlf;
          me.destino = direccionShipping.replace(/["']/g, "");
          me.distrito = zona;
          me.formaPago = element.payment_method==='custom'?'YAPE':element.payment_method;
          me.banco = element.payment_method==='custom'?'YAPE':element.payment_method;
          me.idShopify = element.name.replace(/#/g, "H");
          me.deposito = element.payment_reference === "" ? "NA" : element.payment_reference;
          me.total = element.total;
          me.observacion = element.notes.replace(/["']/g, "") + " - "+ informacion;
          me.codigo = '';
          me.fecha_entrega = split;
          me.slot = timeSlot;

        }

      },


      async registrarPersona() {
        let me = this
        try {
          let response = await axios.post(me.ruta + '/cliente/registrar', {
            'nombre': me.nombre,
            'tipo_documento': me.tipo_documento,
            'num_documento': me.num_documento,
            'id_juntos': me.idJuntos,
            'direccion': me.direccion,
            'telefono': me.tlfCliente,
            'email': me.email
          })
          if (response.status === 200) {
            me.clienteId = response.data.last_insert_id;
          }
          me.nombre = '';
          me.tipo_documento = 'DNI';
          me.num_documento = '';
          me.idJuntos = '';
          me.direccion = '';

          me.tlfCliente = '';
          me.email = '';
          me.errorPersona = 0;
        } catch (error) {

          console.log(error)

        };

      },


      async registrarPedido(detalle) {
        let me = this

        console.log(me.clienteID)
        try {
          let response = await axios.post(me.ruta + '/orden/registrar', {
            'idCliente': me.clienteId,
            'nombre_cliente': me.nombre_cliente,
            'telefono': me.telefono,
            'destino': me.destino,
            'distrito': me.distrito,
            'deposito': me.deposito,
            'fecha_entrega': me.fecha_entrega,
            'total': me.total,
            'formaPago': me.formaPago,
            'banco': me.banco,
            'existe': 1,
            'observacion': me.observacion,
            'servicio': me.servicio,
            'nombre': me.nombre,
            'tipo_documento': me.tipo_documento,
            'num_documento': me.num_documento,
            'id_juntos': me.idJuntos,
            'direccion': me.direccion,
            'email': me.email,
            'idShopify': me.idShopify,
            'slot':me.slot,
            'data': detalle

          })

          me.clienteId = '';
          me.nombre_cliente = '';
          me.telefono = '';
          me.destino = '';
          me.distrito = '';
          me.movilidad = '';
          me.orden_entrega = '';
          me.formaPago = "";
          me.banco = "";
          me.deposito = "";
          me.importe_total = '';
          me.total = 0;
          me.observacion = '';
          me.tipo = "";
          me.cantidad = 0;
          me.codigo = '';
          me.slot='';
          me.servicio = '';
          me.nombre = '';
          me.tipo_documento = 'DNI';
          me.num_documento = '';

          me.direccion = '';

          me.email = '';
          me.idShopify = '';
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
</style>