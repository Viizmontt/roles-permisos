@extends('adminlte::page')
@section('title', 'Usuarios')
@section('content_header')
@stop

@section('content')

    <div class="card-header">
        <div class="d-flex justify-content-end">
            <button class="btn bg-indigo" data-toggle="modal" data-target="#newUser">Nuevo</button>
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
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn bg-teal">Roles</a>
                            <!-- <a href="{{-- route('user.show', $user->id) --}}" class="btn bg-olive">Permisos</a> -->
                        </td>
                        <td>
                            <button type="button" class="btn bg-navy" data-toggle="modal"
                                data-target="#editUser{{ $user->id }}">Editar</button>
                            <form style="display: inline" action="{{ route('user.destroy', $user->id) }}" method="POST"
                                class="formEliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                        @include('users.modal.edit_user')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="newUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-bg-info">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Nombre de Usuario <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name_user"
                                placeholder="Ingrese el nombre del usuario" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email de Usuario <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email_user"
                                placeholder="Ingrese el email del usuario" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Contraseña de Usuario <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password_user"
                                placeholder="Ingrese la contraseña del usuario" required>
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
