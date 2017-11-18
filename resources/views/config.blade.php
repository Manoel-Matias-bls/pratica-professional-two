@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <edit-config categorias="{{ $categoria->toJson() }}" />
        </div>
    </div>
@endsection
