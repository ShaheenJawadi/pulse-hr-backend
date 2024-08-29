<?php

namespace App\Http\Controllers;

use App\Utils\ApiResponse;

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
            return ApiResponse::success($users, 'success');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la récupération des utilisateurs : ' . $e->getMessage());

            return ApiResponse::error('Une erreur est survenue lors de la récupération des utilisateurs.');
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
            return ApiResponse::error(' erreur ', $validator->errors());
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password')),
        ]);
        return ApiResponse::success($user, 'Utilisateur créé avec succès');
    }



    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {


            return ApiResponse::error('error', 'Utilisateur non trouvé');
        }

        return ApiResponse::success($user, 'success');
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if (!$user) {

            return ApiResponse::error('error', 'Utilisateur non trouvé');
        }


        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'sometimes|required|string',
            'password' => 'sometimes|required|string|min:8|confirmed',
        ]);


        if ($validator->fails()) {


            return ApiResponse::error('error', $validator->errors());
        }


        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        $user->role = $request->input('role', $user->role);


        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();


        return ApiResponse::success($user, 'Utilisateur mis à jour avec succès');
    }


    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->delete();
            return ApiResponse::success(null, 'Utilisateur supprimé avec succès');
        } catch (ModelNotFoundException $e) {

            return ApiResponse::error('Utilisateur non trouvé.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage());

            return ApiResponse::error('Une erreur est survenue lors de la suppression de l\'utilisateur.');
        }
    }
}
