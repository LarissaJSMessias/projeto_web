@extends('layouts.app')

@section('content')

<div class="container">
    @include('compra.__apptitulo')
    <div class="tile">
        <div class="tile-body">
    <form action="{{ url('/compra/salvar')}}" method="POST">
        @csrf
        @include('compra._form')
        <div class="center">
            <button type="submit" class="btn btn-primary btn-lg">
                Salvar
            </button>
            <a href="{{ url('/compra/cancelar') }}" class="btn btn-secondary btn-lg ml-3">Cancelar</a>
        </div>
    </form>
    </div>
    </div>
</div>  
@endsection
