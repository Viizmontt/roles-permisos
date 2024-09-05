@extends('adminlte::page')
@section('title', 'Roles')
@section('content_header')
@stop

@section('content')

    <div class="card-header">
        <div class="d-flex justify-content-end">
            <button class="btn bg-indigo" data-toggle="modal" data-target="#newRole">Nuevo</button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success w-100">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('rol.show', $role->id) }}" class="btn bg-olive">Permisos</a>
                        </td>
                        <td>
                            <button type="button" class="btn bg-navy" data-toggle="modal"
                                data-target="#editRole{{ $role->id }}">Editar</button>
                            <form style="display: inline" action="{{ route('rol.destroy', $role->id) }}" method="POST"
                                class="formEliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger"
                                    onclick="return confirm('Estas seguro?')">Eliminar</button>
                            </form>
                        </td>
                        @include('users.modal.edit_role')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="newRole" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-bg-info">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rol.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Nombre de Rol: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name_role"
                                placeholder="Ingrese el nombre del rol" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn bg-indigo">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        setTimeout(function() {
            const alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 6000);
    </script>
@stop
