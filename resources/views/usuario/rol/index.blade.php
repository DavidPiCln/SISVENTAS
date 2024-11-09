@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Administrador de Roles</h1>
@stop

@section('content')
    <div class="row" data-bs-theme="dark">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                <i class="fas fa-user-shield"></i> {{ __('Nuevo Rol') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover display responsive nowrap" width="100%" id="tblRoles">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/DataTables/datatables.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inicializar DataTables
            $('#tblRoles').DataTable({
                responsive: true,
                fixedHeader: true,
                ajax: {
                    url: '{{ route('roles.list') }}',
                    dataSrc: 'data'
                },
                columns: [
                    { data: 'id', width: '10%' },
                    { data: 'name', width: '70%' },
                    {
                        data: null,
                        width: '20%',
                        render: function(data, type, row) {
                            return `
                                <a class="btn btn-sm btn-primary" href="/roles/${row.id}/edit">Editar</a>
                                <button class="btn btn-sm btn-danger" onclick="eliminarRol(${row.id})">Eliminar</button>
                            `;
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

        function eliminarRol(IdRol) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {

                if (result.isConfirmed) {
                    fetch('/roles/' + IdRol, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            // body: Puedes incluir un cuerpo si necesitas enviar datos adicionales al servidor
                        })
                        .then(response => {
                            return response.text();
                        })
                        .then(data => {
                            // Actualizar la tabla, si es necesario
                            $('tblRoles').DataTable().ajax.reload();
                        })
                        .catch(error => {
                            // Manejar errores
                            console.error('Error al eliminar el cliente:', error);
                        });

                    Swal.fire(
                        '¡Eliminado!',
                        'El rol ha sido eliminado.',
                        'success'
                    )

                }
            })
        }
    </script>
@stop
