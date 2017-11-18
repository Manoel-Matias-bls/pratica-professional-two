@extends('layouts.app')

@section('content')

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-15 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div id="list" class="row"> <!-- inicio /#list -->

                            <div class="table-responsive col-md-12">
                                <h2 class="text-center">Relatório geral</h2>
                                <hr>
                                <ul class="nav nav-tabs" style="background-color:  #80ccff;">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('reports', 'all')}}" style="color: #5e5e5e">TODOS OS DADOS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('reports', 'fin')}}" style="color: #5e5e5e">SOMENTE FINALIZADOS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('reports', 'open')}}" style="color: #5e5e5e">EM ABERTO</a>
                                    </li>
                                </ul>



                                <table class="table table-striped" cellspacing="0" cellpadding="0">
                                    <thead>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>CONDUTOR</th>
                                        <th>PLACA</th>
                                        <th>CATEGORIA</th>
                                        <th>ENTRADA</th>
                                        <th>SAÍDA</th>
                                        <th>VALOR TOTAL PAGO</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($entradas as $entrada)
                                            <tr>
                                                <td>{{ $entrada->id }}</td>
                                                <td>{{ $entrada->veiculo->condutor }}</td>
                                                <td>{{ $entrada->veiculo->placa }}</td>
                                                <td>{{ $entrada->veiculo->categoria->nome}}</td>
                                                <td>{{ $entrada->entrada }}</td>
                                                @if($entrada->saida == null)
                                                    <td class="btn-danger">VEÍCULO AINDA NO ESTACIONAMENTO</td>
                                                    <td class="btn-danger">VEÍCULO AINDA NO ESTACIONAMENTO</td>
                                                @else
                                                <td>{{ $entrada->saida }}</td>
                                                <td>R$ {{ number_format($entrada->total, 2, ',', '.') }}</td>
                                               @endif
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div> <!-- fim /#list -->
                        @if(Request::is('*/fin'))
                                <h3 id="tot" style="text-align: right">Total &nbsp;&nbsp; R$ {{number_format($totais, 2, ',', '.')}}</h3>
                        @endif

                        <form action="">
                        <button type="submit" class="btn btn-primary" onclick="window.print();">IMPRIMIR RELATÓRIO</button>
                        </form>
                        <hr>
                        <a href="#top" class="glyphicon glyphicon-chevron-up" style="color: #0099ff; align-content: center"><i>Topo</i></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
