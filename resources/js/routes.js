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
    },{
        path: '/Create',
        name: 'Create',
        component: require('./views/create.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
    },{
        path: '/Index',
        name: 'Index',
        component: require('./views/index.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
    },
    {
        path: '/Update',
        name: 'Update',
        component: require('./views/update.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
        props: true
    },{
        path: '/ReservacionSalas',
        name: 'ReservacionSalas',
        component: require('./views/reservacionSalas.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
        props: true
    }
    ,{
        path: '/SalasDisponibles',
        name: 'SalasDisponibles',
        component: require('./views/salasDisponibles.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
    },
    {
        path: '/SalasReservadas',
        name: 'SalasReservadas',
        component: require('./views/salasReservadas.vue').default,// hay que crear un nuevo directorio llamado views dentro de la carpeta resources/js, y alli cortar y pegar el componente MiComponente
//tambien hay que eliminar el compoenete MiComponente del archivo resources/js/app.js
    } ],
    mode: 'history'
})


