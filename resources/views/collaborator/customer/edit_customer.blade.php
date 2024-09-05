@extends('adminlte::page')
@section('title', 'Editar Cliente')

@section('content_header')
@stop

@section('content')
    <div class="card-header">
        Editar Cliente / {{$customer->name}}
    </div>
    <div class="card-body">
        <form action="{{ route('customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name_customer" class="col-form-label">Nombre del Cliente: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name_customer" name="name_customer"
                    value="{{ old('name_customer', $customer->name) }}" placeholder="Ingrese el nombre del cliente" required>
            </div>
            <div class="form-group">
                <label for="account_customer" class="col-form-label">Número de Cuenta: <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="account_customer" name="account_customer"
                    value="{{ old('account_customer', $customer->account) }}" placeholder="Ingrese el número de cuenta" required 
                    oninput="this.value = this.value.replace(/[^0-9-]/g, '')"
                    title="Solo se permiten números y guiones">
            </div>
            <div class="form-group">
                <label for="community" class="form-label">Comunidades: <span class="text-danger">*</span></label>
                <select name="community" id="community" class="form-control">
                    @foreach ($communities as $community)
                        <option value="{{ $community->id }}" {{ $customer->community_id == $community->id ? 'selected' : '' }}>
                            {{ $community->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-indigo">Actualizar</button>
                <a class="btn bg-danger" href="{{ route('customer.index') }}">Retornar</a>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
