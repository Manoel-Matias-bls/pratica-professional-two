@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body" style="">
                        <hr>
                        <h1 class="text-uppercase" style="color: #103d10; font-size: 350%; text-align:center"><i><u>Controle de estacionamento</u></i></h1>
                        <hr>
                        <a href="{{route('home')}}" class="btn btn-default active" style="color: #85e085; font-size: x-large">Nova entrada</a>
                        <hr>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
