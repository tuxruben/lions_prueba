<template>
    <div id="Create">
<form>
  <div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" class="form-control" name="nombre"  id="nombre" v-model="data.nombre" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <button type="button" class="btn btn-primary" @click="store()">Agregar</button>
</form>
    </div>
</template>
<script>
    import axios from "axios";
    //Obtener el token csrf
    window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    export default {
        name: 'Create',
        props: {
            componente: String
        },
        data() {
            return {
                subtitulo: 'Soy el subtitulo del componente',
                lists: [],
                data: {
                    nombre: ""
                }
            }
        },
        mounted() {
        }
        , methods: {
            store: function () {// crea los registros de la tabla salas
                axios.post('lions_prueba/public/salas_juntas' , this.data, {
                    _token: csrfToken,
                }).then(y => {
                    console.log(y.data);
                     this.$router.push({
                            name: 'Index'
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