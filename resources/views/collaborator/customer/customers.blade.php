@extends('adminlte::page')
@section('title', 'Clientes')

@section('content_header')
@stop

@section('content')
    <div class="card-header">
        <div class="d-flex justify-content-end">
            <a class="btn bg-indigo" href="{{ route('customer.create') }}">Nuevo</a>
        </div>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div id="success-alert" class="alert alert-success w-100">
                {{ session('success') }}
            </div>
        @endif
        
        @php
            $heads = ['Id', 'No de Cuenta', 'Nombre', 'Comunidad', ['label' => 'Acciones', 'no-export' => true, 'width' => 20]];
            $config = config('datatables.config1');
        @endphp
        
        <x-adminlte-datatable id="table7" :heads="$heads" :config="$config" hoverable with-buttons>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->account }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->community ? $customer->community->name : 'N/A' }}</td>
                    <td>
                        <a class="btn bg-navy" href="{{ route('customer.edit', $customer->id) }}">Editar</a>
                        <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
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
