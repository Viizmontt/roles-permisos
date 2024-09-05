@extends('adminlte::page')
@section('title', 'Permisos')
@section('content_header')
@stop
@section('content')

    <div class="card-header">
        <div class="d-flex justify-content-end">
            <button class="btn bg-indigo" data-toggle="modal" data-target="#newPermission">Nuevo</button>
        </div>
    </div>
    <div class="card-body">
        @php
            $heads = ['Id', 'Nombre', ['label' => 'Acciones', 'no-export' => true, 'width' => 20]];
            $config = config('datatables.config3');
        @endphp
        @if (session('success'))
            <div id="success-alert" class="alert alert-success w-100">
                {{ session('success') }}
            </div>
        @endif
        <x-adminlte-datatable id="table7" :heads="$heads" :config="$config" hoverable with-buttons>
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a class="btn bg-navy" href="#" data-toggle="modal"
                            data-target="#editPermission{{ $permission->id }}">Editar</a>
                            <form style="display: inline" action="{{ route('permission.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este permiso?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger">Eliminar</button>
                            </form>
                    </td>
                    @include('users.modal.edit_permission')
                </tr>
            @endforeach
        </x-adminlte-datatable>

    </div>
    <div class="modal fade" id="newPermission" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-bg-info">
                <div class="modal-header bg-indigo">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Permiso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Nombre de Permiso: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name_permission"
                                placeholder="Ingrese el nombre del permiso" required>
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