require('./bootstrap');

//vue js
window.Vue = require('vue');

//vform
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

window.Form = Form;



//vue router
import VueRouter from 'vue-router';

Vue.use(VueRouter);


//vue routes
import {routes} from './routes/routes';


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



const router = new VueRouter({
	routes,
	mode: 'history',
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/backend/dashboard.vue').default);






const app = new Vue({
    el: '#app',
    router
});
