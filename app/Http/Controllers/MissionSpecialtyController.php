<?php

namespace App\Http\Controllers;

use App\Models\MissionSpecialty;
use App\Models\Mission;
use App\Models\Specialty;
use Illuminate\Http\Request;

class MissionSpecialtyController extends Controller
{
    public function index()
    {
        // Obtener todas las misiones con sus especialidades asociadas
        $relations = Mission::with('specialties')->get();

        if ($relations->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron relaciones entre Misión y Especialidades',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'Relaciones entre Misión y Especialidad encontradas',
            'data' => $relations
        ], 200);
    }
    
    // Crear una nueva relación entre Misión y Especialidad
    public function store(Request $request)
    {
        // Validar que se envíen los campos necesarios
        $validatedData = $request->validate([
            'mission_id' => 'required|integer',
            'specialty_id' => 'required|integer',
        ]);

        // Verificar si la misión existe
        $mission = Mission::find($validatedData['mission_id']);
        if (!$mission) {
            return response()->json([
                'message' => 'La misión con el ID ' . $validatedData['mission_id'] . ' no existe',
                'status' => 404
            ], 404);
        }

        // Verificar si la especialidad existe
        $specialty = Specialty::find($validatedData['specialty_id']);
        if (!$specialty) {
            return response()->json([
                'message' => 'La especialidad con el ID ' . $validatedData['specialty_id'] . ' no existe',
                'status' => 404
            ], 404);
        }

        // Crear la relación en la tabla pivot
        $relation = MissionSpecialty::create($validatedData);

        return response()->json([
            'message' => 'Relación entre Misión y Especialidad creada correctamente',
            'data' => $relation
        ], 201);
    }
}
