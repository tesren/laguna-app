@extends('pages.base')

@section('content')
    <h1>Single unit: {{$unit->name}}</h1>

    @include('pages.shared.contact')
@endsection