@extends('adminlte::page')

@section('title', 'Nuevo Rol')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            @includeIf('partials.errors')

            <div class="card card-info">
                <div  class="card-header text-center bg-info   text-white">
                    <i class="fas fa-user-shield mr-2"></i>
                    <h5>Crear Nuevo Rol</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('roles.store') }}" role="form">
                        @csrf

                        @include('usuario.rol.form')
                        
                        <div class="form-group text-right mt-3">
                            <a href="{{ route('roles.index') }}" class="btn btn-danger mr-2">{{ __('Cancelar') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
