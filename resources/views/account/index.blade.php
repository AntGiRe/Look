@extends('layouts.app')

@section('title', 'Ajustes de cuenta')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar sesión</button>
    </form>
@endsection
