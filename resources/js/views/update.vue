<template>
    <div id="Create">
<form>
  <div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text" class="form-control" name="nombre"  id="nombre" v-model="data.nombre" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <button type="button" class="btn btn-primary" @click="update()">Actualizar</button>
</form>
    </div>
</template>
<script>
    import axios from "axios";
    //Obtener el token csrf
    window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    export default {
        name: 'Create',
        props: ['id'],
        data() {
            return {
                subtitulo: 'Soy el subtitulo del componente',
                lists: [],
                data: {
                    nombre: ""
                }
            }
        },
        created() {//Obtiene los datos cuando se crea el componente
       axios.get('lions_prueba/public/salas_juntas/' + this.id, {
            _token: csrfToken,
        }).then(y => {
                    this.data.nombre = y.data.nombre;
                    console.log(y.data);
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
    mounted() {},
        methods: {
            //metodo para actualizar registros en la base de datos
           update() {

            axios.put('lions_prueba/public/salas_juntas/'+this.id, this.data, {
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