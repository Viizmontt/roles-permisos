@extends('adminlte::page')

@section('title', 'Asignación de Permisos')

@section('content_header')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Permisos para el Rol / {{ $role->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('rol.updatePermission', $role) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <select name="permissions[]" class="form-select" id="multiple-select-field" data-placeholder="Selecciones los permisos" multiple>
                        @foreach ($allPermission as $permission)
                            <option value="{{ $permission->id }}"
                                {{ in_array($permission->id, $rolePermission) ? 'selected' : '' }}>
                                {{ $permission->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('rol.index') }}" class="btn btn-danger">Retornar</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap-5-theme.min.css') }}" />
@stop

@section('js')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#multiple-select-field').select2({
                theme: "bootstrap-5",
                width: '100%',
                placeholder: 'Selecciones los roles',
                closeOnSelect: false
            });
        });
    </script>
@stop
