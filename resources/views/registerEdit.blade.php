@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Alteração de Usuários</div>

                    <div class="panel-body">

                        {{Form::model($user, ['method' => 'PATCH', 'url' => route('updateUser',$user->id)])}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="padding-bottom: 5%">
                                <label for="name" class="col-md-4 control-label">Nome</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" style="padding-bottom: 5%">
                                <label for="email" class="col-md-4 control-label">Endereço de E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}" style="padding-bottom: 5%">
                                <label for="role" class="col-md-4 control-label">Role</label>
                                <div class="col-md-6">
                                    <select id="role" class="form-control" name="role">
                                        <option value="{{$user->id}}">
                                            @if($user->role == "user")
                                                Usuário comum
                                            @else
                                                Administrador
                                            @endif
                                        </option>
                                        <option id="role1" value="admin">Administrador</option>
                                        <option id="role2" value="user">Usuário comum</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
