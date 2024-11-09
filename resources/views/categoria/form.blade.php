<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        
                        <input type="text" name="nombre" value="{{ $categoria->nombre }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre">
                        @if ($errors->has('nombre'))
                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        @endif
                    </div>
                </div>
                <div class="card-footer mt-3 text-right">
                    <a href="{{ route('categorias.index') }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
