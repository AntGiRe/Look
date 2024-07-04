@extends('layouts.app')

@section('title', 'Ajustes de cuenta')

@section('content')
    <section class="bg-white flex flex-col items-center gap-2 rounded-lg">
        <h1 class="font-bold text-lg p-2">Ajustes de la cuenta</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="font-bold uppercase p-2 m-2 rounded-lg text-gray-600 text-sm hover:bg-red-300 transition">Cerrar sesión</button>
        </form>
    </section>
@endsection
