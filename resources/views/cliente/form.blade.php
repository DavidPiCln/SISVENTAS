<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre">
                        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="Teléfono">
                        {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="Dirección">
                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('clientes.index') }} " class="btn btn-danger">{{ __('Cancelar') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
        </div>
    </div>
</div>


