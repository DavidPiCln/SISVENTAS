@extends('adminlte::page')

@section('title', 'Roles y Permisos')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h4>Editar permisos: <strong>{{ $role->name }}</strong></h4>
                </div>
                <div class="card-body">
                    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put', 'id' => 'roleForm']) !!}
                    
                    <div class="form-group">
                        <h5 class="mb-4">Selecciona los permisos para este rol:</h5>
                        
                        @foreach ($permisos as $permiso)
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="permisos[]" 
                                    value="{{ $permiso->id }}" 
                                    id="permiso_{{ $permiso->id }}"
                                    @if(in_array($permiso->id, $role->permissions->pluck('id')->toArray())) checked @endif>
                                <label class="form-check-label" for="permiso_{{ $permiso->id }}">
                                    <i class="fas fa-key"></i> {{ $permiso->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Guardar Cambios
                        </button>
                        <a href="{{ route('roles.index') }}" class="btn btn-danger ml-3">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Opción para usar SweetAlert al hacer submit
    document.getElementById('roleForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe inmediatamente

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Los cambios se guardarán permanentemente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, guardar cambios'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviamos el formulario
                this.submit();
            }
        });
    });

    // Mostrar SweetAlert de éxito si hay un mensaje en la sesión
    @if(Session::has('success'))
        window.onload = function() {
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#3085d6'
            });
        }
    @endif
</script>
@stop
