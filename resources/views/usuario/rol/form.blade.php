<div class="d-flex justify-content-center mt-5">
    <div class="card card-info" style="width: 100%; max-width: 500px;">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="nombre" value="{{ $roles->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre del rol">
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
</div>
