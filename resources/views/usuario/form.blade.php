<div class="card card-info">
    <div class="card-body row">        
        <div class="form-group col-md-4">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ $usuario->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre">
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-3">
            <label for="email">Correo</label>
            <input type="text" name="email" value="{{ $usuario->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo">
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-5">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña">
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>       
    </div>
    <div class="card-footer mt-3 text-right">
        <a href="/usuarios" class="btn btn-danger">{{ __('Cancelar') }}</a>
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
