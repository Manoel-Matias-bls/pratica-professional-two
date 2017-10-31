@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {{Form::open(['url' => route('store')])}}

                        <div class="form-group">
                            <label for="horarioEnt" class="control-label">Entrada</label>
                            {{ Form::datetime('datetime', \Carbon\Carbon::now('America/Fortaleza')->format('Y-m-d H:i:s'), ['class'=>'form-control', 'autofocus']) }}
                        </div>

                        <div class="form-group">
                            <label for="condutor" class="control-label">Condutor</label>
                            <input name="condutor" class="form-control" placeholder="Nome do Condutor..." type="text" required>
                        </div>

                        <div class="form-group">
                            <label for="placa" class="control-label">Placa</label>
                            <input id="placa" name="placa" class="form-control campoplaca" placeholder="Placa..." type="text" autofocus required>
                        </div>

                        <div id="divComboStore" class="form-group">
                            <label for="sel">Selecione a categoria:</label>
                            <select id="comboCategorias" class="form-control" name="categoria">
                                @foreach($categoria as $cat)
                                    <option value="{{$cat->id}}">{{$cat->nome}} : R${{$cat->valor}},00 a hora</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
