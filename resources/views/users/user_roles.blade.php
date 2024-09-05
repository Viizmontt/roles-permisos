@extends('adminlte::page')

@section('title', 'Asignación de Roles')

@section('content_header')
    <h1>Asignación de Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Roles para el Usuario / {{ $user->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('user.updateRoles', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <select name="roles[]" class="form-select" id="multiple-select-field" data-placeholder="Selecciones los roles" multiple>
                        @foreach ($all_roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->id, $user_roles) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Retornar</a>
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
