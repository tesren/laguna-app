@extends('admin.base-admin')

@section('content')

<h1>Dashboard</h1>

<h2>Mensajes: {{ count($messages); }} </h2>
    
@endsection