@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de Control</h1>
@stop

@section('content')
    <p>Bienvenido al panel de Administracion</p>
@stop

@push('css')
{{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@endpush

@push('js')
    <script> console.log('Hi!'); </script>
@endpush
