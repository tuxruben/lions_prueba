<template>
    <div id="nav-bar">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active" style="margin-right:5%;">
                          <router-link  :to="{ name: 'Index' } "  style="color:black; font-size:12px;"><b>Lista de las salas</b> </router-link>
                      </li>
                       <li class="nav-item active" style="margin-right:5%;">
                          <router-link  :to="{ name: 'SalasDisponibles' } "  style="color:black; font-size:12px;" ><b > Reservacion de salas</b> </router-link>
                      </li>
                       <li class="nav-item active" style="margin-right:5%;">
                          <router-link  :to="{ name: 'SalasReservadas' } "  style="color:black; font-size:12px;"><b > Liberacion de salas</b> </router-link>
                      </li>


                    </ul>

                  </div>
                </nav>
    </div>
</template>

<script>

    export default {
        name: 'NavBar',
        props: {

        },

        mounted() {

        }

    }
</script>