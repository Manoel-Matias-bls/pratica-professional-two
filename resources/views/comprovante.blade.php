@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div id="list" class="row">

                            <div class="table-responsive col-md-12">
                                <h2 class="text-center">Comprovante de pagamento</h2>
                                <hr>
                                <table class="table table-striped" cellspacing="0" cellpadding="0">
                                    <dl>
                                        <dt>COD: {{$entradas->id}}</dt>
                                        <dt>CONDUTOR: {{$entradas->veiculo->condutor}}</dt>
                                        <dt>PLACA: {{ $entradas->veiculo->placa }}</dt>
                                        <dt>CATEGORIA: {{ $entradas->veiculo->categoria->nome}}</dt>
                                        <dt>HORÁRIOS:</dt>
                                            <dd>Entrada: {{ $entradas->entrada }}</dd>
                                            <dd>Saída: {{ $entradas->saida }}</dd>
                                        <dt>VALOR PAGO: R$ {{ $entradas->total }}</dt>
                                    </dl>

                                    <button class="btn btn-success btn-xs" href="{{route('home')}}" onclick="window.print();">FINALIZADO</button>

                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

