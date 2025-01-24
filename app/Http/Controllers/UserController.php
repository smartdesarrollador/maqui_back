<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Rol;
use App\Models\Permiso;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;


use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(Request $request){
$user = User::where('email',$request['email'])->first();

if($user){
    $response['status'] = 0;
        $response['message'] = 'El Email ya existe';
        $response['code'] = 200;
}else{
$user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $response['status'] = 1;
        $response['message'] = 'Usuario registrado exitosamente';
        $response['code'] = 200;
}

        
        return response()->json($response);
    }

    public function login(Request $request){
        $credentials = $request->only('email','password');

         try{
if(!JWTAuth::attempt($credentials)){
    $response['status'] = 0;
        $response['code'] = 401;
        $response['data'] = null;
        $response['message'] = 'El correo o la contraseña son incorrectos';
        return response()->json($response);
}
        }catch(JWTException $e){
            $response['data'] = null;
        $response['code'] = 500;
        $response['message'] = 'No se pudo crear el token';
        return response()->json($response);
        }

        $user = auth()->user();
        $usuario = User::find($user->id);
        $roles = $usuario->rol()->pluck('nombre')->toArray(); 

        $data['token'] = auth()->claims([
            'user_id' => $user->id,
            'email' => $user->email,
            'rol' => $roles[0]
        ])->attempt($credentials);

        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['message'] = 'Inicio de sesión exitosamente';

        return response()->json($response);

    }

    /* Funciones Blog */

    public function index()
    {
        // Obtener todos los usuarios con los posts relacionados
        $users = User::with('posts')->get();
        return UserResource::collection($users);
    }

    public function create()
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'rol' => 'required|in:autor,administrador',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        return new UserResource($user);
    }

    public function show(User $user)
    {
        // Mostrar un usuario específico con sus posts relacionados
        return new UserResource($user->load('posts'));
    }

    public function edit(User $user)
    {
        // En una API RESTful, esta función no se utiliza normalmente.
        return response()->json(['message' => 'Method not allowed'], 405);
    }

    public function update(Request $request, User $user)
    {
        // Validar los datos para actualizar el usuario
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8',
            'rol' => 'sometimes|required|in:autor,administrador',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Actualizar el usuario
        $user->update([
            'name' => $request->nombre ?? $user->nombre,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'rol' => $request->rol ?? $user->rol,
        ]);

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        // Eliminar el usuario
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
