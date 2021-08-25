@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="nome" class="control-label">Número:</label>
<input type="text"
        name="numero"
        id="numero"
        value="{{isset($registro->numero) ? $registro->numero : ''}}"
        class="form-control @error ('numero') is-invalid @enderror" />
        @error('numero')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="valor" class="control-label">Valor:</label>
<input type="text"
        name="valor"
        id="valor"
        value="{{ isset($registro->valor) ? $registro->valor : '' }}"
        class="form-control" @error ('valor') is-invalid @enderror" />
        @error('valor')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="saida" class="control-label">Saída:</label>
<input type="text"
        name="saida"
        id="saida"
        value="{{ isset($registro->saida) ? $registro->saida : '' }}"
        class="form-control" @error ('saida') is-invalid @enderror" />
        @error('saida')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="chegada" class="control-label">Chegada:</label>
<input type="text"
        name="chegada"
        id="chegada"
        value="{{ isset($registro->chegada) ? $registro->chegada : '' }}"
        class="form-control" @error ('chegada') is-invalid @enderror" />
        @error('chegada')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="tempovoo" class="control-label">Tempo de voo:</label>
<input type="text"
        name="tempovoo"
        id="tempovoo"
        value="{{ isset($registro->tempovoo) ? $registro->tempovoo : '' }}"
        class="form-control" @error ('tempovoo') is-invalid @enderror" />
        @error('tempovoo')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="aeroportosaida" class="control-label">Aeroporto de saída:</label>
<input type="text"
        name="aeroportosaida"
        id="aeroportosaida"
        value="{{ isset($registro->aeroportosaida) ? $registro->aeroportosaida : '' }}"
        class="form-control" @error ('aeroportosaida') is-invalid @enderror" />
        @error('aeroportosaida')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="aeroportochegada" class="control-label">Aeroporto de chegada:</label>
<input type="text"
        name="aeroportochegada"
        id="aeroportochegada"
        value="{{ isset($registro->aeroportochegada) ? $registro->aeroportochegada : '' }}"
        class="form-control" @error ('aeroportochegada') is-invalid @enderror" />
        @error('aeroportochegada')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 