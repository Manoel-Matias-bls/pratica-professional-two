@extends('layouts.app')

@section('content')

    <hr>
    <hr>

    <div class="col-md-6">
        <a href="{{route('register')}}" class="btn btn-primary pull-left h2">Novo usuário</a>
    </div>

    <hr>
    <hr>
    <hr>
    <hr>

    <div id="main" class="container-fluid">

        <div id="list" class="row"> <!-- inicio /#list -->

            <div class="table-responsive col-md-12">
                <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th class="actions">AÇÕES</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($user as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name  }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->role }}</td>

                                <td class="actions">

                                    <a class="btn btn-warning btn-xs" href="{{route('editUser', $usuario->id)}}">Editar</a>

                                    {{ Form::open(['method'=> 'DELETE','url'=>  route('delete/user',$usuario->id), 'style' => 'display: inline']) }}
                                    <button type="submit" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal">Excluir</button>
                                    {{ Form::close() }}

                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div> <!-- fim /#list -->

    </div>  <!-- /#main -->
    <a href="#top" class="glyphicon glyphicon-chevron-up" style="color: #0099ff; align-content: center"><i>Topo</i></a>


@endsection
