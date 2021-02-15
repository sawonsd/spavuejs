require('./bootstrap');

//vue js
window.Vue = require('vue');




//vform
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

window.Form = Form;
//vform


//vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//vue router

//vue routes
import {routes} from './routes/routes';
//vue routes

//Sweet Alert2
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;
//Sweet Alert2


//Toastr Aleart
import toastr from "toastr";

window.toastr = toastr;

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

//End Toastr Aleart



import Vuex from 'vuex'

Vue.use(Vuex)

import storeData from "./store/store";

import {filter} from "./filter/filter";

const store = new Vuex.Store(
	storeData
);



const router = new VueRouter({
	routes,
	//mode: 'history',
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/backend/dashboard.vue').default);






const app = new Vue({
    el: '#app',
    router,
    store
    
});
