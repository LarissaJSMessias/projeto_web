@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <label for="datacompra" class="control-label">Data da Compra:</label>
<input type="text"
        name="datacompra"
        id="datacompra"
        value="{{isset($registro->datacompra) ? $registro->datacompra : ''}}"
        class="form-control @error ('datacompra') is-invalid @enderror" />
        @error('datacompra')
        <div class="invalid-feedback">
            <span><strong>{{ $message}}</strong></div>
            </div> 
            @enderror

    </div>
    </div>
</div> 
