@extends('layouts.app')

@section('content')

    <div id="main" class="container-fluid">
        <!-- inicio /#top -->
        <div id="top" class="row">

            <div class="col-md-2">
                <h2>Itens</h2>
            </div>

            {{--<div class="col-md-6">--}}
                {{--<div class="input-group h2">--}}
                    {{--<input name="conPlaca" class="form-control" id="search" type="text" placeholder="Pesquisar placa">--}}
                    {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-primary" type="submit">--}}
                    {{--<span class="glyphicon glyphicon-search" id="btn-lupa"></span>--}}
                {{--</button>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-4">
                <a href="{{route('home')}}" class="btn btn-primary pull-right h2">Nova entrada</a>
            </div>
        </div> <!-- fim /#top -->

        <hr/> <!-- deixa um espaço livre -->

        <div id="list" class="row"> <!-- inicio /#list -->

            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>ENTRADA</th>
                        <th>CONDUTOR</th>
                        <th>PLACA</th>
                        <th>CATEGORIA</th>
                        <th class="actions">AÇÕES</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($entradas as $entrada)
                        @if($entrada->saida == null)
                        <tr>

                            <td>{{ $entrada->id }}</td>
                            <td>{{ $entrada->entrada }}</td>
                            <td>{{ $entrada->veiculo->condutor }}</td>
                            <td>{{ $entrada->veiculo->placa }}</td>
                            <td>{{ $entrada->veiculo->categoria->nome}}</td>

                            <td class="actions">

                                <a class="btn btn-success btn-xs" href="{{ route('saida',$entrada->id) }}">Saída</a>
                                <a class="btn btn-warning btn-xs" href="{{ route('editar',$entrada->id) }}">Editar</a>

                                {{ Form::open(['method'=> 'DELETE','url'=>  route('delete',$entrada->id), 'style' => 'display: inline']) }}
                                <button type="submit" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal">Excluir</button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @else
                        @endif
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div> <!-- fim /#list -->

        <div id="bottom" class="row"> <!-- Inicio /.pagination -->
            <div class="col-md-12">

                <ul class="pagination">
                    <li class="disabled"><a>&lt; Anterior</a></li>
                    <li class="disabled"><a>1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
                </ul><!-- fim /.pagination -->

            </div>
        </div> <!-- /#bottom -->

    </div>  <!-- /#main -->

@endsection
