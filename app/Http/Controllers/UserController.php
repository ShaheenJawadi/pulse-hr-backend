<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
    
            return response()->json([
                'status' => 'success',
                'data' => $users
            ], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des utilisateurs : ' . $e->getMessage());
    
            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de la récupération des utilisateurs.'
            ], 500);
        }
    }
   

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'messages' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Utilisateur créé avec succès',
            'user' => $user
        ], 201);
    }

   

    public function show(string $id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'status' => 'error',
            'message' => 'Utilisateur non trouvé'
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'user' => $user
    ], 200);
}

    
public function update(Request $request, $id)
{

    $user = User::find($id);

    if (!$user) {
        return response()->json(['status' => 'error', 'message' => 'Utilisateur non trouvé'], 404);
    }


    $validator = Validator::make($request->all(), [
        'name' => 'sometimes|required|string|max:255',
        'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
        'role' => 'sometimes|required|string',
        'password' => 'sometimes|required|string|min:8|confirmed',
    ]);


    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'messages' => $validator->errors()
        ], 422);
    }


    $user->name = $request->input('name', $user->name);
    $user->email = $request->input('email', $user->email);
    $user->role = $request->input('role', $user->role);


    if ($request->has('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Utilisateur mis à jour avec succès',
        'user' => $user
    ], 200);
}

    
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
    
            $user->delete();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Utilisateur supprimé avec succès.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Utilisateur non trouvé.'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());
    
            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur est survenue lors de la suppression de l\'utilisateur.'
            ], 500);
        }
    }
}
