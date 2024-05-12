@extends('layouts.app')

@section('title', 'Crear post')

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <p>Imagen aqui</p>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action=" {{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 black uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo del post"
                        value="{{ old('titulo') }}"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 black uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descipcion del post"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded" />
            </form>
        </div>
    </div>
@endsection
