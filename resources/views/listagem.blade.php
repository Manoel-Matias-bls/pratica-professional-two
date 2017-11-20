@extends('layouts.app')

@section('content')

    <div id="main" class="container-fluid">
        <!-- inicio /#top -->
        <div id="top" class="row">

            <div class="col-md-2 text-left">
                <h2>Itens</h2>
                <a href="{{route('home')}}" class="btn btn-primary h2">Nova entrada</a>
            </div>
            <hr>
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
                      {{--  <th>VALOR</th>--}}
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
                          {{--  <td>{{ $entrada->total }}</td> --}}

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
            <a href="#top" class="glyphicon glyphicon-chevron-up" style="color: #0099ff; align-content: center"><i>Topo</i></a>
        </div> <!-- fim /#list -->

    </div>  <!-- /#main -->

@endsection
