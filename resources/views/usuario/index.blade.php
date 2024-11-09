@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <div class="row" html data-bs-theme="dark">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                        <div class="float-right">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nuevo Usuario') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert fade_success .fade">
                            <strong>{{ $message }}</strong>
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display responsive nowrap" width="100%" id="tblUsers">
                            <thead class="thead">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Foto</th>
                                    <th></th> {{-- boton editar --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('/DataTables/datatables.min.css') }}">    
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="/DataTables/datatables.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inicializar DataTables
            $('#tblUsers').DataTable({
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '{{ route('users.list') }}',
                    dataSrc: 'data'
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: null, 
                        render: function(data, type, row) {
                            return ''
                        }
                    },
                    {
                        // Columna de estado con botón activado/desactivado
                        data: null,
                        render: function(data, type, row) {
                            if (data != 0) {
                                return '<button class="btn btn-success btn-xs btnActivar" idUsuario="' + row.id + '" estadoUsuario="0">Activo</button>';
                            } else {
                                return '<button class="btn btn-danger btn-xs btnActivar" idUsuario="' + row.id + '" estadoUsuario="1">Desactivado</button>';
                            }
                        }
                    },
                    
                    {
                        // Columna de imagen
                        data: 'profile_photo_path',
                        render: function(data) {
                            const imgSrc = data ? '/storage/' + data : '';
                            return '<img src="' + imgSrc + '" class="img-thumbnail rounded-square">';
                        }
                    },
                   
                    
                    {
                        // Agregar columna para acciones
                        data: null,
                        render: function(data, type, row) {
                            // Agregar botones de editar y eliminar
                            return '<a class="btn btn-sm btn-primary" href="/usuarios/' + row.id + '/edit">Editar</a>';
                            
                        }, 
                        orderable: false
                        
                    }
                ],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/2.1.8/i18n/es-MX.json',
                },
                order: [
                    [0, 'desc']
                ]
            });
        });

        // Función para eliminar un cliente
        function deleteUser(userId) {
            Swal.fire({
                title: "Eliminar",
                text: "¿Estás seguro de que quieres eliminar este cliente?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/usuarios/' + userId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        return response.text();
                    })
                    .then(data => {
                        // Actualizar la tabla, si es necesario
                        $('#tblUsers').DataTable().ajax.reload();
                    })
                    .catch(error => {
                        // Manejar errores
                        console.error('Error al eliminar:', error);
                    });
                }
            });
        }
    </script>
@stop
