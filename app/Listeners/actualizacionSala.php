<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Salas_junta;
class actualizacionSala
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    //metodo que hace que el escuchador tome el id del evento y haga la actualizacion de la tabla salas
    public function handle($event)
    {
          $salas_junta = Salas_junta::find($event->id);
          $salas_junta->update(['horario_inicial' =>null,
          'horario_final' =>null,'reservado' =>false]);
    }
}
