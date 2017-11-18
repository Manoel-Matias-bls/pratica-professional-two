<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{

    public function show(User $user)
    {
        $userAll = $user->get();

        return view('listRegistro', ['user' => $userAll] );
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('registro');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('registerEdit', ['user' => $user]);
    }

    public function registerUpdate($id, Request $request)
    {

        $user = User::findOrFail($id);

        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');

        $user->name = $name;
        $user->email = $email;
        $user->role = $role;

        $user->save();

        \Session::flash('msg_sucesso', "Usuário editado com sucesso! Cod: &nbsp;".$id);

        return redirect('registro');

    }





}
