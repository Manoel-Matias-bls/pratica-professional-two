@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div id="list" class="row">

                            <div class="table-responsive col-md-12">
                                <h1 class="text-center" style="color: red"><b>Access Denied!</b></h1>
                                <hr>
                                <table class="table table-striped" cellspacing="0" cellpadding="0">

                                    <h3>Funcionalidades restritas àqueles que possuem perfil de administrador</h3>
                                    <h5>Você é apenas um usuário comum</h5>
                                    <h5>Retorne</h5>

                                    <a class="btn btn-danger glyphicon glyphicon-arrow-left" href="{{route('read')}}"> VOLTAR</a>

                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

