<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\User;


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




}
