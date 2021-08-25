@extends('layouts.app')
@section('content')

<div class="container">
    @include('voo.__apptitulo')
    <div class="tile">
        <div class="tile-body">
    <form action="{{ url('/voo/alterar' , $registro->id)}}" method="POST">
        @csrf
        @include('voo._form')
        <div class="center">
            <button type="submit" class="btn btn-primary btn-lg">
                Alterar
            </button>
            <a href="{{ url('/voo/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar</a>
        </div>
    </form>
    </div>
    </div>
</div>  


@endsection