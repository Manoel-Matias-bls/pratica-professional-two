<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Entrada;
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

        public function inicio()
        {
            return view('inicio');
        }

        public function index()
        {
            $val = Categoria::get();
            return view('home', ['categoria' => $val]);
        }

        public function show(Entrada $entrada)
        {
            $ent = $entrada->get();

            return view('listagem', ['entradas' => $ent]);
        }

        public function store(Request $request, Entrada $ent, Veiculo $car, Categoria $cat)
        {

            $datetime = $request->input('datetime');
            $condutor = $request->input('condutor');
            $placa = $request->input('placa');
            $categoria = $request->input('categoria');

            $cat = $cat->findOrFail($categoria);

            $car = $cat->veiculo()->updateOrCreate(['condutor' => $condutor, 'placa' => $placa]);

            $car->entrada()->updateOrCreate(['entrada' => $datetime]);

            return redirect('listagem');

        }

        public function edit($id)
        {
            $ent = Entrada::findOrFail($id);
            $cat = Categoria::get();

            return view('update', ['entradas' => $ent, 'categoria' => $cat]);
        }


        public function update($id, Request $request)
        {
            $ent = Entrada::findOrFail($id);

            $condutor = $request->input('condutor');
            $placa = $request->input('placa');
            $categoria = $request->input('categoria');

            $ent->veiculo->condutor = $condutor;
            $ent->veiculo->placa = $placa;
            $ent->veiculo->categorias_id = $categoria;

            $ent->veiculo->save();

            return redirect('listagem');

        }

        public function saida($id)
        {
            $ent = Entrada::find($id);
            $cat = Categoria::get();

            $valHora = ($ent->veiculo->categoria->valor / 60);
            $valDiaria = 180;

            $totDiaria = 0;
            $totHora = 0;
            $totMinuto = 0;

            $dtFinal = \Carbon\Carbon::now('America/Fortaleza');

            $dtInicio = $ent->entrada;

            $diff = $dtInicio->diff($dtFinal);

            if ($diff->d != 0) {
                $totDiaria = $valDiaria * $diff->d;
            }

            if ($diff->h != 0) {
                $totHora = $valHora*(($diff->h-3)*60);
            }

            if ($diff->i != 0) {
                $totMinuto = $diff->i * $valHora;
            }
            if ($totDiaria==0 && $totHora==0 && $diff->i <=15)
            {
                $total = 0;
            }
            else
            {
                $total = $totDiaria + $totHora + $totMinuto;

                $total = round($total,2);
            }


            return view('saida', ['entradas' => $ent, 'categoria' => $cat, 'total' => $total]);
        }


        public function fechamento($id, Request $request)
        {

            $ent = Entrada::findOrFail($id);

            $condutor = $request->input('condutor');
            $placa = $request->input('placa');
            $categoria = $request->input('categoria');
            $datetimeSaida = $request->input('datetimeSaida');
            $total = $request->input('total');

            $ent->veiculo->condutor = $condutor;
            $ent->veiculo->placa = $placa;
            $ent->veiculo->categorias_id = $categoria;

            $ent->saida = $datetimeSaida;
            $ent->total = $total;

            $ent->veiculo->save();

            $ent->save();

            $ent = Entrada::findOrFail($id);

            return view('comprovante', ['entradas' => $ent]);

        }

        public function delete($id)
        {
            $ent = Entrada::findOrFail($id);
            $ent->veiculo->delete();
            $ent->delete();

            return redirect('listagem');
        }

        public function report(Entrada $entrada)
        {
            $ent = $entrada->get();

            return view('report', ['entradas' => $ent]);
        }

        public function reports(Entrada $entrada, $par)
        {
            if ($par == 'all')
                $ent = $entrada->get();

            if ($par == 'fin')
                $ent = $entrada->get()->where('saida', $entrada->saida == null)->where('total', $entrada->total == null);

            if ($par == 'open')
                $ent = $entrada->get()->where('saida', $entrada->saida != null)->where('total', $entrada->total != null);

            return view('report', ['entradas' => $ent]);
        }

        public function config()
        {
            $categoria = Categoria::all();

            return view('config', ['categoria' => $categoria]);
        }


    }
