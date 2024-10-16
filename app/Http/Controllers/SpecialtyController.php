<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    // Listar todas las especialidades
    public function index()
    {
        $specialties = Specialty::all();

        if ($specialties->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron Especialistas',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'Especialidades encontradas',
            'data' => $specialties
        ], 200);
    }

    // Mostrar una especialidad por ID
    public function show($id)
    {
        $specialty = Specialty::with('quotas')->find($id);

        if (!$specialty) {
            return response()->json([
                'message' => 'La especialidad no existe',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'message' => 'Especialidad encontrada',
            'data' => $specialty
        ], 200);
    }

    // Crear una nueva especialidad
    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        // Crear una nueva especialidad
        $specialty = Specialty::create($validatedData);

        return response()->json([
            'message' => 'Especialidad creada correctamente',
            'data' => $specialty
        ], 201);
    }

    // Actualizar una especialidad por ID
    public function update(Request $request, $id)
    {
        // Encontrar la especialidad
        $specialty = Specialty::find($id);

        if (!$specialty) {
            return response()->json([
                'message' => 'La especialidad no existe',
                'status' => 404
            ], 404);
        }

        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        // Actualizar la especialidad
        $specialty->update($validatedData);

        return response()->json([
            'message' => 'Especialidad actualizada correctamente',
            'data' => $specialty
        ], 200);
    }

    // Eliminar una especialidad por ID
    public function destroy($id)
    {
        // Encontrar la especialidad
        $specialty = Specialty::find($id);

        if (!$specialty) {
            return response()->json([
                'message' => 'La especialidad no existe',
                'status' => 404
            ], 404);
        }

        // Eliminar la especialidad
        $specialty->delete();

        return response()->json([
            'message' => 'Especialidad eliminada correctamente'
        ], 200);
    }
}
