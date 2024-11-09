<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="codigo">Código</label>
                            <input type="text" name="codigo" value="{{ $producto->codigo }}" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" placeholder="Código">
                            @if ($errors->has('codigo'))
                                <div class="invalid-feedback">{{ $errors->first('codigo') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
                            <label for="producto">Producto</label>
                            <input type="text" name="producto" value="{{ $producto->producto }}" class="form-control{{ $errors->has('producto') ? ' is-invalid' : '' }}" placeholder="Producto">
                            @if ($errors->has('producto'))
                                <div class="invalid-feedback">{{ $errors->first('producto') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="precio_compra">Precio Compra</label>
                            <input type="text" name="precio_compra" value="{{ $producto->precio_compra }}" class="form-control{{ $errors->has('precio_compra') ? ' is-invalid' : '' }}" placeholder="Precio Compra">
                            @if ($errors->has('precio_compra'))
                                <div class="invalid-feedback">{{ $errors->first('precio_compra') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="precio_venta">Precio Venta</label>
                            <input type="text" name="precio_venta" value="{{ $producto->precio_venta }}" class="form-control{{ $errors->has('precio_venta') ? ' is-invalid' : '' }}" placeholder="Precio Venta">
                            @if ($errors->has('precio_venta'))
                                <div class="invalid-feedback">{{ $errors->first('precio_venta') }}</div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_categoria">Categoría:</label>
                            <select name="id_categoria" class="form-control">
                                <option value="" disabled selected>Selecciona una categoría</option>
                                @foreach($categorias as $id => $categoria)
                                    <option value="{{ $id }}" {{ $id == $producto->id_categoria ? 'selected' : '' }}>{{ $categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_categoria">Stock:</label>
                            <input type="text" name="stock" value="{{ $producto->stock }}" class="form-control{{ $errors->has('Stock') ? ' is-invalid' : '' }}" placeholder="stock">
                            @if ($errors->has('stock'))
                                <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                            @endif
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" placeholder="Foto">
                            @if ($errors->has('foto'))
                                <div class="invalid-feedback">{{ $errors->first('foto') }}</div>
                            @endif
                            @if ($producto->foto)
                                <img src="{{ asset('storage/' . $producto->foto) }}" alt="Imagen actual" style="max-width: 100px; max-height: 100px;">
                            @else
                                <p>Sin imagen</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-3 text-right">
                    <a href="/productos" class="btn btn-danger">{{ __('Cancelar') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
