@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {{Form::model($entradas, ['method' => 'PATCH', 'url' => route('atualizar',$entradas->id)])}}

                        <div class="form-group">
                            <label for="horarioEnt" class="control-label">Entrada</label>
                            {{ Form::datetime('datetime', $entradas->entrada->format('Y-m-d H:i:s'), ['class'=>'form-control', 'autofocus']) }}
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

                        <button type="submit" class="btn btn-primary">Salvar</button>

                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
