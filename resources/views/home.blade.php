@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>COLORES NORMALES</p>
    <button class="btn bg-primary">Primary (primary)</button>
    <button class="btn bg-secondary">Secondary (secondary)</button>
    <button class="btn bg-success">Success (success)</button>
    <button class="btn bg-info">Info (info)</button>
    <button class="btn bg-warning">Warning (warning)</button>
    <button class="btn bg-danger">Danger (danger)</button>
    <button class="btn bg-black">Black (black)</button>
    <button class="btn bg-gray-dark">Gray Dark</button>
    <button class="btn bg-gray">Gray (gray)</button>
    <button class="btn bg-light">Light (light)</button>
    <p>COLORES EXTRAS</p>
    <button class="btn bg-indigo">Indigo (indigo)</button>
    <button class="btn bg-navy">Navy (navy)</button>
    <button class="btn bg-purple">Purple (purple)</button>
    <button class="btn bg-fuchsia">Fuchsia (fuchsia)</button>
    <button class="btn bg-pink">Pink (pink)</button>
    <button class="btn bg-orange">Orange (orange)</button>
    <button class="btn bg-teal">Teal (teal)</button>
    <button class="btn bg-olive">Olive (olive)</button>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
