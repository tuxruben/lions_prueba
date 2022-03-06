<template>
    <div id="Index">
            <h2>{{subtitulo}}</h2>
        <h2>{{componente}}</h2>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
        <th scope="col">
        </th>
         <th scope="col">
        </th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="(item, index) in lists" :key="item.id">
      <th scope="row" v-if="item.reservado ==0"> {{item.id}}</th>
      <td v-if="item.reservado ==0">{{item.nombre}}</td>

         <td v-if="item.reservado ==0" ><router-link :to="{name:'ReservacionSalas',params:{id:item.id}}" ><b class=" btn-warning">Reservar</b></router-link></td>
    </tr>
  </tbody>
</table>


    </div>
</template>
<script>
    import axios from "axios";
    //Obtener el token csrf
    window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    export default {
        name: 'Index',
        props: {
            componente: String
        },
        data() {
            return {
                subtitulo: 'Salas Disponibles',
                lists: []
            }
        },
        mounted() {
            this.getSalas()
        }
        , methods: {
            getSalas: function () {//mustra los registros de la tabla salas
                axios.get('lions_prueba/public/salas_juntas' , {
                _token: csrfToken,
            }).then(response => {
                    this.lists = response.data
                    console.log(this.lists);
                });
            }

        },
    }
</script>