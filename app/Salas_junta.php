<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salas_junta extends Model
{
   protected $table = 'salas_juntas';
   protected $fillable = ['nombre', 'horario_inicial','horario_final'];
}
