<?php

namespace App\Http\Controllers;

use App\Models\Quota;
use Illuminate\Http\Request;

class QuotaController extends Controller
{
    // Listar todos los cupos
    public function index()
    {
        $quotas = Quota::with('specialty')->get();
        return response()->json([
            'status' => 'success',
            'data' => $quotas
        ], 200);
    }

    // Mostrar un cupo por ID
    public function show($id)
    {
        $quota = Quota::with('specialty')->find($id);

        if (!$quota) {
            return response()->json([
                'status' => 'error',
                'message' => 'Quota not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $quota
        ], 200);
    }

    // Crear un nuevo cupo
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'day' => 'required|string|max:255',
            'quota' => 'required|integer',
            'specialty_id' => 'required|exists:specialties,id', // Validar que la especialidad exista
        ]);

        $quota = Quota::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Quota created successfully',
            'data' => $quota
        ], 201); // 201 Created
    }

    // Actualizar un cupo por ID
    public function update(Request $request, $id)
    {
        $quota = Quota::find($id);

        if (!$quota) {
            return response()->json([
                'status' => 'error',
                'message' => 'Quota not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'day' => 'required|string|max:255',
            'quota' => 'required|integer',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        $quota->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Quota updated successfully',
            'data' => $quota
        ], 200); // 200 OK
    }

    // Eliminar un cupo por ID
    public function destroy($id)
    {
        $quota = Quota::find($id);

        if (!$quota) {
            return response()->json([
                'status' => 'error',
                'message' => 'Quota not found'
            ], 404);
        }

        $quota->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Quota deleted successfully'
        ], 204); // 204 No Content (la respuesta no tiene contenido, pero indica éxito)
    }
}
