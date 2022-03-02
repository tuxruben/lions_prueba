//configuracion de vue.js para definir lar rutas
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);
export default new VueRouter({
    routes: [{
        path: '/mi-componente',
        name: 'mi-componente',
        component: require('./views/MiComponente.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
    }, ],
    mode: 'history'
})


