
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.$ = window.jQuery = require('jquery'); 
import 'bootstrap-table/dist/bootstrap-table.min.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

window.Vue = require('vue');
import Vue from 'vue'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import moment from 'moment';
import VueMoment from 'vue-moment';
import VueEllipseProgress from 'vue-ellipse-progress';



  

// Load Locales ('en' comes loaded by default)
require('moment/locale/es');

// Choose Locale
moment.locale('es');

Vue.use(VueMoment, { moment });

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(VueEllipseProgress)





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('categoria', require('./components/Categoria.vue'));
Vue.component('articulo', require('./components/Articulo.vue'));
Vue.component('cliente', require('./components/Cliente.vue'));
Vue.component('proveedor', require('./components/Proveedor.vue'));
Vue.component('rol', require('./components/Rol.vue'));
Vue.component('user', require('./components/User.vue'));
Vue.component('ingreso', require('./components/Ingreso.vue'));
Vue.component('venta', require('./components/Venta.vue'));
Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('consultaingreso', require('./components/ConsultaIngreso.vue'));
Vue.component('consultaventa', require('./components/ConsultaVenta.vue'));
Vue.component('notification', require('./components/Notification.vue'));
Vue.component('orden', require('./components/Orden.vue'));
Vue.component('consultaorden', require('./components/ConsultaOrden.vue'));
Vue.component('reportrutas', require('./components/ReportRutas.vue'));
Vue.component('rptdespacho', require('./components/RptDespacho.vue'));
Vue.component('rptpagos', require('./components/RptPagos.vue'));
Vue.component('recursoshumanos', require('./components/RecursosHumanos.vue'));
Vue.component('consolidadoarticuloreceta', require('./components/ConsolidadoArticuloReceta.vue'));
Vue.component('mostrarrecetascostos', require('./components/MostrarRecetasCostos.vue'));
Vue.component('mostrarrecetascostosdetalle', require('./components/MostrarRecetasCostosDetalle.vue'));
Vue.component('uploadcsv', require('./components/UploadCsv.vue'));  
Vue.component('yapepago', require('./components/YapePago.vue'));  
  

  

const app = new Vue({
    el: '#app',
    data :{
        menu : 0,
        notifications: [],
        ruta: 'http://localhost:84/sistema/public',
        pago: 'pago',
        coment: 'coment',
        det_serv: 'det_serv',
        con_serv: 'con_serv'

    },
    created() {
        let me = this;     
        axios.post(this.ruta + '/notification/get').then(function(response) {
           //console.log(response.data);
           me.notifications=response.data;    
        }).catch(function(error) {
            console.log(error);
        });

        var userId = $('meta[name="userId"]').attr('content');
        
        Echo.private('App.User.' + userId).notification((notification) => {
             me.notifications.unshift(notification); 
        }); 
        
    }        
});
