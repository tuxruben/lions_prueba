<template>
    <div id="Create">
   <h2>{{subtitulo}}</h2>

<form>
  <div class="form-group">
    <label for="horario_inicial">Fecha inicial: </label>
    <!-- Campo de entrada de hora -->
  Selecciona la hora deseada:
  <input type="time"  class="form-control" name="horario_inicial" id="horario_inicial" v-model="data.horario_inicial" min="18:00" max="21:00" step="3600" />
  </div>
   <div class="form-group">
    <label for="horario_inicial">Fecha finial: </label>
    <!-- Campo de entrada de hora final -->
  Selecciona la hora deseada:
  <input type="time"  class="form-control" name="horario_final" id="horario_final" v-model="data.horario_final" min="18:00" max="21:00" step="3600" />
  </div>
  <button type="button" class="btn btn-primary" @click="update()">Reservar</button>
</form>
    </div>
</template>
<script>
    import axios from "axios";
    import moment from "moment";

    //Obtener el token csrf
    window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    export default {
        name: 'Reservacion',
        props: ['id'],
        data() {
            return {
                subtitulo: 'Reservacion de salas',
                lists: [],
                data: {
                    horario_inicial: '',
                    horario_final: '',
                    reservacion :''
                },

            }
        },  created() {//Obtiene los datos cuando se crea el componente
       axios.get('lions_prueba/public/salas_juntas/' + this.id, {
            _token: csrfToken,
        }).then(y => {
                    this.data.reservacion = y.data.reservado;
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
        mounted() {
        }
        , methods: {
             update() {//Metodo para reservar la sala y asignarle un horario inicial y final


var horaInicial = moment(this.data.horario_inicial,'HH:mm');
var horaFinal = moment(this.data.horario_final,'HH:mm');
 horaInicial.add(moment.duration('02:00'));
var fechaLimite =moment(horaInicial.format('HH:mm'),'HH:mm');
 horaInicial = moment(this.data.horario_inicial,'HH:mm');

console.log("fechaLimite", fechaLimite);

console.log("horaFinal", horaFinal);

console.log("horaInicial", horaInicial);

console.log("this.reservacion", this.reservacion);
if( this.data.reservacion==0){
if( horaFinal.isAfter(fechaLimite)||horaFinal.isBefore(horaInicial)){

         console.log("No se puede Reservar");

            }else{

            axios.put('lions_prueba/public/reservacion/'+this.id, this.data, {
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

            }}else{
               console.log("No se puede Reservar");
            }
            }
        },
    }
</script>