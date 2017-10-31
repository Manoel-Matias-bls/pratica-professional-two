@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading"><h2>Configurações</h2></div>
                    <form action="">
                        <div class="panel-body">

                            <h4>Alterações em categorias</h4>
                            <div class="form-group">

                                <label for="sel1">Nome categoria:</label>

                                <select id="comboCategoria" class="form-control" name="categoria" onchange="set(this.value)">
                                    @foreach($categoria as $cat)
                                        <option id="{{$cat->id}}" value="{{$cat->valor}}">{{$cat->nome}}</option>
                                    @endforeach
                                </select>

                                <label>Valor:</label>
                                <input id="idVal" type="text" class="form-control campodinheiro">

                                <script>
                                    function set(val) {
                                        document.getElementById("idVal").value = val;
                                    }
                                </script>

                            </div>
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
