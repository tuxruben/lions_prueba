<template>
    <div id="Index">
            <h2>{{subtitulo}}</h2>


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
        <th scope="col">horario_inicial</th>
      <th scope="col">horario_final</th>
        <th scope="col">
        </th>
         <th scope="col">
        </th>
    </tr>
  </thead>
  <tbody>
    <tr  v-for="(item, index) in lists" :key="item.id">
      <th scope="row" v-if="item.reservado ==1"> {{item.id}}</th>
      <td v-if="item.reservado ==1">{{item.nombre}}</td>
        <th scope="row" v-if="item.reservado ==1"> {{item.horario_inicial}}</th>
      <td v-if="item.reservado ==1">{{item.horario_final}}</td>
      <td v-if="item.reservado ==1">  <button type="button" class=" btn btn-danger" name="button" @click="liberar(item.id)">Liberar</button></td>

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
                subtitulo: 'Salas Reservadas',
                lists: [],
                data: {
                    nombre: ""
                }
            }
        },
        created() {
         // hace una peticion get al metodo que libera las saLas con horario final qye ya vencio
       axios.get('lions_prueba/public/liberacionAutomatica' , {
            _token: csrfToken,
        }).then(y => {
            this.getSalas()

                }).catch(err => {
                    if (err.response) {
                        console.log(err.response.statusText);
                    } else {
                        console.log("Revise su coneccion de internet");
                    }
                    if (err.response.status == 403) {
                        console.log("Verifique sus datos");
                    }
                    if (err.response.status == 401) {

                        this.$router.push({
                            name: 'Index'
                        });
                    }
                });

            },
        mounted() {

        }
        , methods: {
            getSalas: function () {//mustra los registros de la tabla salas
                axios.get('lions_prueba/public/salas_juntas' , {
                _token: csrfToken,
            }).then(response => {
                    this.lists = response.data
                    console.log(this.lists);
                });
            },liberar(id) {//metodo que hace la peticion put para liberar la sala
            axios.put('lions_prueba/public/liberacion/'+id, this.data, {
                _token: csrfToken,
             }).then(y => {
                    console.log(y.data);
                     this.$router.push({
                            name: 'SalasDisponibles'
                        });
                }).catch(err => {
                    if (err.response) {
                        console.log(err.response.statusText);
                    } else {
                        console.log("Revise su coneccion de internet");
                    }
                    if (err.response.status == 403) {
                        console.log("Verifique sus datos");
                    }
                    if (err.response.status == 401) {

                        this.$router.push({
                            name: 'Index'
                        });
                    }
                });


            }

        },
    }
</script>