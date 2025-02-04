@extends('adminlte::page')

@section('title', 'Nuevo usuario')

@section('content_header')
    <h1>Nuevo usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">

            @includeIf('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Create') }} Usuario</span>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('usuarios.store') }}" role="form">
                        @csrf

                        @include('usuario.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
