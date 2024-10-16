<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Specialty;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    // Listar todas las misiones
    public function index()
    {
        // Obtener todas las misiones sin cargar relaciones
       // $missions = Mission::all();
        //$specialties = Specialty::all();

         // Obtener los datos del alumno y la materia
         $missions =  Mission::all();
         $specialties = Specialty::all();
 
         // Devolver los datos en formato JSON
         return response()->json([
             'missions' =>  $missions,
             'specialties' => $specialties,
         ]);

       // if ($missions->isEmpty()) {
          //  return response()->json([
               // 'message' => 'No se encontraron misiones'
           // ], 404);
       // }

      //  return response()->json([
        //    'message' => 'Misiones recuperadas con éxito',
         //   'data' => $missions
      //  ], 200);
    }

    // Mostrar una misión por ID
    public function show($id)
    {
        // Obtener una misión específica sin cargar relaciones
        $mission = Mission::find($id);

        if (!$mission) {
            return response()->json([
                'message' => 'Misión no encontrada'
            ], 404);
        }

        return response()->json([
            'message' => 'Misión encontrada',
            'data' => $mission
        ], 200);
    }

    // Crear una nueva misión
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'country' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'creation_date' => 'required|date',
        ]);

        // Crear la nueva misión
        $mission = Mission::create($validated);

        return response()->json([
            'message' => 'Misión creada con éxito',
            'data' => $mission
        ], 201);
    }

    // Actualizar una misión existente
    public function update(Request $request, $id)
    {
        // Buscar la misión
        $mission = Mission::find($id);

        if (!$mission) {
            return response()->json([
                'message' => 'Misión no encontrada'
            ], 404);
        }

        // Validar los datos de entrada
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'country' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'creation_date' => 'required|date',
        ]);

        // Actualizar la misión
        $mission->update($validated);

        return response()->json([
            'message' => 'Misión actualizada correctamente',
            'data' => $mission
        ], 200);
    }

    // Eliminar una misión
    public function destroy($id)
    {
        $mission = Mission::find($id);

        if (!$mission) {
            return response()->json([
                'message' => 'Misión no encontrada'
            ], 404);
        }

        // Eliminar la misión
        $mission->delete();

        return response()->json([
            'message' => 'Misión eliminada con éxito'
        ], 200);
    }
}
