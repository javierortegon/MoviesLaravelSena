@extends('layouts.app')

@section('content')
    @php
        echo session('nombreUsuario');
    @endphp


@endsection
