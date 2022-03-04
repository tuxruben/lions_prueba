<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salas_junta;


class salas_juntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // metodo para mostrar los registros de la tabla salas
    public function index()
    {
        return Salas_junta::all();
    }
    //Metodo para mostrar un registro en particular de la tabla salas
 public function show($id)
    {
        $salas_junta = Salas_junta::find($id);


        if (is_null($salas_junta)) {
            return response()->json('Product not found.');
        }
          return response()->json($salas_junta);
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //metodo para crear un registro en la tabla salas
    public function store(Request $request)
    {
        $salas_junta= Salas_junta::create(['nombre' => $request->nombre]);

        return response()->json($salas_junta, 201);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo para actualizar un registro en la tabla salas
    public function update(Request $request, Salas_junta $salas_junta)
    {
         $salas_junta->update(['nombre' =>request('nombre'),]);

        return response()->json($salas_junta, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo para eliminar un registro en la tabla salas
    public function destroy(Salas_junta $salas_junta)
    {
        $salas_junta->delete();

        return response()->json(null, 204);
    }
}
