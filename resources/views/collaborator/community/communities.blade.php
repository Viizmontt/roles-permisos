@extends('adminlte::page')
@section('title', 'Comunidades')

@section('content_header')
@stop

@section('content')
    <div class="card-header">
        <div class="d-flex justify-content-end">
            <button class="btn bg-indigo" data-toggle="modal" data-target="#newCommunity">Nuevo</button>
        </div>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success w-100">
                {{ session('success') }}
            </div>
        @endif
        
        @php
            $heads = ['Id', 'Nombre', 'Descripción', ['label' => 'Acciones', 'no-export' => true, 'width' => 20]];
            $config = config('datatables.config1');
        @endphp
        
        <x-adminlte-datatable id="table7" :heads="$heads" :config="$config" hoverable with-buttons>
            @foreach ($communities as $community)
                <tr>
                    <td>{{ $community->id }}</td>
                    <td>{{ $community->name }}</td>
                    <td>{{ $community->description }}</td>
                    <td>
                        <button class="btn bg-navy" data-toggle="modal" data-target="#editCommunity{{ $community->id }}">Editar</button>
                        
                        <form style="display: inline" action="{{ route('community.destroy', $community->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta comunidad?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-danger">Eliminar</button>
                        </form>
                    </td>
                    @include('collaborator.modals.edit_community')
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

    @include('collaborator.modals.create_community')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 6000);
        });
    </script>
@stop
