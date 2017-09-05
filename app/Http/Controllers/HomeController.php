<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Valore;
use App\Veiculo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $val = Valore::get();
        return view('home', ['valores' => $val]);
    }

    public function show(Entrada $entrada, Veiculo $veiculo)
    {
        $ent = $entrada->get();
        $car = $veiculo->get();
//        $car = $veiculo->where('id', $ent)->get();

        return view('listagem', ['entradas' => $ent, 'veiculos' => $car]);
    }
}
