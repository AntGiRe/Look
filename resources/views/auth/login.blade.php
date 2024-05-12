@extends('layouts.app')

@section('title', 'Inicia sesión')

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen registro usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if(session('status'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('status') }}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 black uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu email" value="{{ old('email') }}" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 black uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password" name="password" type="password" placeholder="Tu password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="text-gray-500 text-sm">
                        Recuérdame
                    </label>
                </div>

                <input type="submit" value="Iniciar sesión" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded"/>
            </form>
        </div>
    </div>
@endsection