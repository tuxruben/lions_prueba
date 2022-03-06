<template>
    <div id="Index">
            <h2>{{subtitulo}}</h2>
        <h2>{{componente}}</h2>
        <ul class="navbar-nav mr-auto">

                        <li class="nav-item" style="cursor:pointer; padding-top:2%; ">
                            <button class="btn btn-primary">
                                <router-link :to="{name:'Create'}" style="color:white; ">Nueva Sala</router-link>
                            </button>

                        </li>
          </ul>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
        <th scope="col">
        </th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="(item, index) in lists" :key="item.id">
      <th scope="row"> {{item.id}}</th>
      <td>{{item.nombre}}</td>
       <td>  <button type="button" class=" btn btn-danger" name="button" @click="delet(item.id)">Borrar</button></td>
         <td class="text-center" ><router-link :to="{name:'Update',params:{id:item.id}}" ><b >Editar</b></router-link></td>
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
                subtitulo: 'CRUD Salas',
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
            },
            delet(id) { //realiza el borrado de registros

                axios.delete('lions_prueba/public/salas_juntas/' + id, {
                    _token: csrfToken,

                }).then(y => {
                     console.log(y.data);

                }).catch(err => {

                    if (err.response) {
                      console.log(err.response.statusText);
                    } else {
                        console.log("Revise su coneccion de internet");
                    }
                    if (err.response.status == 401) {
                       console.log("Verifique sus datos");
                        this.$router.push({
                            name: 'index'
                        });
                    }
                });
        },

        },
    }
</script>