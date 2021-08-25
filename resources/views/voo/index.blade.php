@extends('layouts.app')
@section('content')
<div class="container">
    <div class="app-title">
        <h1>
            <i class="fa fa-edit">Lista de Voos</i>
        </h1>
        <ul class="app-bredcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('/cliente/home')}}">Menu Principal</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <form class="form form-inline" action="{{ url('search_voo') }}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-1">Número:</label> <input type="text"
                                class="form-control col-sm-9" id="numero" name="numero"
                                placeholder="Digite um numero para pesquisar" value="{{ $filters['numero'] ?? '' }}" />
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar <i class="fa fa-search-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="tile">
            <div class="tile-body">
                <div id="no-more-tables">
                    <table class="table table-striped table-bordered table-hover cf">
                        <thead class="cf">
                            <tr>
                                <th style="font-weight: bold; text-align: center;">Codigo do Voo</th>
                                <th style="font-weight: bold; text-align: center;">Número</th>
                                <th style="font-weight: bold; text-align: center;">Saída</th>
                                <th style="font-weight: bold; text-align: center;">Chegada</th>
                                <th style="font-weight: bold; text-align: center;">Valor</th>
                                <th style="font-weight: bold; text-align: center;">Aeroporto de saída</th>
                                <th style="font-weight: bold; text-align: center;">Aeroporto de chegada</th>
                                <th style="font-weight: bold; text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registros as $registro)
                               <tr>
                                   <td data-title="Id"  style="text-align: center" >{{$registro->id }}</td>
                                   <td data-title="Nome"  style="text-align: center">{{$registro->numero}}</td>
                                   <td data-title="Email"  style="text-align: center">{{$registro->saida}}</td>
                                   <td data-title="Telefone"  style="text-align: center">{{$registro->chegada}}</td>
                                   <td data-title="Email"  style="text-align: center">{{$registro->valor}}</td>
                                   <td data-title="Telefone"  style="text-align: center">{{$registro->aerportosaida}}</td>
                                   <td data-title="Telefone"  style="text-align: center">{{$registro->aerportochegada}}</td>
                                    <td data-title="Ações"  style="text-align: center">
                                       <a class="btn btn-info btn-sm"  style="text-align: center" href="{{url('voo/alterar', $registro->id)}}"><i class="fa fa-pencil"></i></a>
                                       <a class="btn btn-danger btn-sm"  style="text-align: center" href="{{url('voo/excluir', $registro->id)}}"><i class="fa fa-trash"></i></a>
                                       <a class="btn btn-warning btn-sm"  style="text-align: center" href="{{url('voo/consultar', $registro->id)}}"><i class="fa fa-address-book"></i></a>
                                   </td>
                               </tr>
                            @endforeach
                        </tbody> 
                    </table>
                    @if(@isset($filters))
                        {{$registros->appends($filters)->links()}}
                    @else
                        {{$registros->links()}}  
                    @endisset
                    
                    <a class="btn btn-success btn-sm" href="{{url('voo/incluir')}}">Incluir<i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
    
@endsection