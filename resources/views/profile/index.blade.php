@extends('layouts.app')

@section('title', 'Edita tu perfil ' . auth()->user()->username)

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Alias</label>
                        <input type="text" id="username" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('username') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror"
                            required placeholder="Pepesito" value="{{ auth()->user()->username }}" />
                        @error('username')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Ups!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('username') bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 @enderror"
                            placeholder="Pepe" required value="{{ auth()->user()->name }}" />
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Ups!</span>
                                {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Cambia tu imagen de
                    perfil</label>
                <div class="flex items
                -center justify-center mb-5">
                    <img src="{{ auth()->user()->profileImg ? Storage::url('look/profiles/' . auth()->user()->profileImg) : asset('img/user.svg') }}"
                        alt="Imagen usuario" class="w-24 h-24 md:w-48 md:h-48 rounded-full mx-auto">
                </div>

                <input name="profileImg"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    aria-describedby="file_input_help" id="profileImg" type="file">
                <p class="mt-1 mb-5 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG o JPG</p>


                <div class="mb-5">
                    <label for="presentation"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Presentación</label>
                    <textarea id="presentation" rows="2" name="presentation"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...">{{ auth()->user()->presentation }}</textarea>
                    @error('username')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Ups!</span>
                            {{ $presentation }}</p>
                    @enderror
                </div>


                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded" />
            </form>
        </div>
    </div>
@endsection
