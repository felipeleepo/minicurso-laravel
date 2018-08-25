<?php

namespace App\Http\Controllers;

use \App\User as User;
use \App\Order;
use \Illuminate\Http\Request/* as Request*/;

class UserController extends Controller
{
    /*
      Classe Usuário
    */
    // TIPO DE VALIDAÇÃO DOS ATRIBUTOS DO MODELO
    private $validate = [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required'
    ];

    // TODOS OS USUÁRIOS
    public function getAll()
    {
        $user = User::all();
        return response()->json($user);
    }

    // USUÁRIO POR ID
    public function getUser($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // INSERT USUÁRIO
    public function setUser(Request $request)
    {
        $this->validate($request, $this->validate);

        $user = User::create(
          [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => \Illuminate\Support\Facades\Hash::make($request->input('password')),
            'api_token' => str_random(40)
          ]
        );

        return response()->json(['succecs' => true,'retorno' => $user]);

    }
}
