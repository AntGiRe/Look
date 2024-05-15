@extends('layouts.app')

@section('title', 'Edita tu perfil ' . auth()->user()->username)

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 black uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" value="{{ auth()->user()->username }}" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="profileImg" class="mb-2 black uppercase text-gray-500 font-bold">
                        Imagen de perfil
                    </label>
                    <input id="profileImg" name="profileImg" type="file" accept=".jpg, .jpeg, .png" placeholder="Tu imagen de perfil" value="" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" value="Guardar cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded"/>
            </form>
        </div>
    </div>
@endsection