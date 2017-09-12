@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {{Form::model($entradas, ['method' => 'PATCH', 'url' => route('fechamento',$entradas->id)])}}

                        <div class="form-group">
                            <label for="horarioEnt" class="control-label">Entrada</label>
                            {{ Form::datetime('datetime', $entradas->entrada->format('Y-m-d H:i:s'), ['class'=>'form-control', 'autofocus']) }}
                        </div>

                        <div id="horarioSaida" class="form-group">
                            <label for="horarioEnt" class="control-label">Saída</label>
                            {{ Form::datetime('datetimeSaida', \Carbon\Carbon::now('America/Sao_Paulo')->format('Y-m-d H:i:s'), ['class'=>'form-control', 'autofocus']) }}
                        </div>

                        <div class="form-group">
                            <label for="condutor" class="control-label">Condutor</label>
                            <input name="condutor" class="form-control" placeholder="Nome do Condutor..." type="text"
                                   value="{{ $entradas->veiculo->condutor }}" required>
                        </div>

                        <div class="form-group">
                            <label for="placa" class="control-label">Placa</label>
                            <input name="placa" class="form-control" placeholder="Placa..." type="text"
                                   value="{{ $entradas->veiculo->placa }}" required>
                        </div>

                        <div id="divComboStore" class="form-group">
                            <label for="sel">Selecione a categoria:</label>
                            <select id="comboCategorias" class="form-control" name="categoria">

                                <option value="{{$entradas->veiculo->categoria->id}}">{{$entradas->veiculo->categoria->nome}}</option>

                                @foreach($categoria as $cat)
                                    @if($cat->id == $entradas->veiculo->categoria->id){}
                                    @else{ <option value="{{$cat->id}}">{{$cat->nome}}</option> }
                                    @endif
                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="total" class="control-label">Valor Total a pagar</label>
                            <span class="glyphicon glyphicon-refresh"></span>
                            <input name="total" class="form-control campodinheiro" placeholder="Valor Total..." type="text" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
