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
        public function index()
        {
            $val = Categoria::get();
            return view('home', ['categoria' => $val]);
        }

        public function show(Entrada $entrada, Veiculo $veiculo)
        {
            $ent = $entrada->get();
            $car = $veiculo->get();
            $cat = Categoria::get();

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

            $ent = $ent->get();

            return view('listagem', ['entradas' => $ent]);

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

            $ent = Entrada::get();


            return view('listagem', ['entradas' => $ent]);

        }

        public function saida($id)
        {
            $ent = Entrada::findOrFail($id);
            $cat = Categoria::get();

            return view('saida', ['entradas' => $ent, 'categoria' => $cat]);
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
            $ent = Entrada::get();
            return view('listagem', ['entradas' => $ent]);
        }

    }
