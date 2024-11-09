@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Empresa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Compañía') }}</h3>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert fade_success .fade">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('compania.update', $compania) }}" role="form">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" id="nombre"
                                        class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Nombre') }}" value="{{ $compania->nombre }}" required>
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono">{{ __('Teléfono') }}</label>
                                    <input type="text" name="telefono" id="telefono"
                                        class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Teléfono') }}" value="{{ $compania->telefono }}">
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="correo">{{ __('Correo') }}</label>
                                    <input type="email" name="correo" id="correo"
                                        class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Correo') }}" value="{{ $compania->correo }}">
                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="direccion">{{ __('Dirección') }}</label>
                                    <input type="text" name="direccion" id="direccion"
                                        class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Dirección') }}" value="{{ $compania->direccion }}">
                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box-footer mt20 text-right">
                            <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
