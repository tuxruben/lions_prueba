//configuracion de Vue.js para poder mostrar  las rutas y el componete navbar
require('./bootstrap');
window.Vue = require('vue');
Vue.component('nav-bar', require('./components/NavBar.vue').default);
import router from './routes.js'
const app = new Vue({
    el: '#app',//toda la vista se va a mostrar en el div que tenga como id la palabra app
    router
});