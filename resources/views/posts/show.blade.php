@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2 bg-white rounded-lg">
            <div class="flex justify-center items-center">
                <img class="rounded-lg w-11/12 mt-8" src="{{ $post->image }}" alt="Imagen del post {{ $post->title }}">
            </div>

            <div class="px-8 py-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                    <div class="flex space-x-3">
                        <livewire:like-post :post="$post" />
                        @auth
                            @if ($post->user_id === auth()->user()->id)
                                <button data-modal-target="delete-post" data-modal-toggle="delete-post" type="button"
                                    class="hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                                <div id="delete-post" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="delete-post">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Cerrar modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estas
                                                    seguro
                                                    de querer eliminar este post?</h3>
                                                <form class="cursor-pointer hover:text-red-600 transition"
                                                    id="delete-post-{{ $post->id }}"
                                                    action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" class="hidden" />
                                                    <button
                                                        onclick="document.getElementById('delete-post-{{ $post->id }}').submit()"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Si, estoy seguro
                                                    </button>
                                                    <button data-modal-hide="delete-post" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                        para nada</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="flex items-center mt-2">
                    <div class="w-14 flex-shrink-0 mr-4">
                        <a href="{{ route('posts.index', $post->user) }}"><img class="w-12 h-12 rounded-full mx-auto"
                                src="{{ $post->user->profileImg ? Storage::url('look/profiles/' . $post->user->profileImg) : asset('img/user.svg') }}"
                                alt="Imagen de perfil de {{ $post->user->username }}"></a>
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-600"><a class="font-semibold mr-1 hover:underline"
                                href="{{ route('posts.index', $post->user) }}">{{ $post->user->username }}</a>
                            {{ $post->description }}</p>
                        <p class="text-sm text-gray-500">
                            {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-1/2 m-5 shadow bg-white h-4/6">
            <div class="p-5 mb-5">
                @auth

                    @if (session('success'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="flex items-center mb-5 gap-3">
                            <div class="w-14 flex-shrink-0">
                                <img class="w-14 h-14 rounded-full mx-auto"
                                    src="{{ auth()->user()->profileImg ? Storage::url('look/profiles/' . auth()->user()->profileImg) : asset('img/user.svg') }}"
                                    alt="Imagen de perfil de {{ auth()->user()->username }}">
                            </div>
                            <div class="flex-grow">
                                <textarea maxlength="222" id="comment" name="comment" placeholder="Comenta en el post de {{ $post->user->username }}"
                                    class="bg-gray-200 border p-3 w-full rounded-lg max-h-32 border-gray-300 @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <button
                                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-3xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>
                            </button>
                        </div>
                    </form>
                @endauth
                <hr class="w-48 h-1 mx-auto my-4 bg-gray-500 border-0 rounded md:my-10">
                <div class="bg-gray-200 mg-5 max-h-96 overflow-y-scroll mt-10 hide-scrollbar rounded-lg">
                    @if ($post->comments->count() > 0)
                        @foreach ($post->comments as $comment)
                            <div class="p-4 m-2 border-gray-300 border-b bg-white rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-14 flex-shrink-0 mr-4">
                                        <a href="{{ route('posts.index', $comment->user) }}"><img
                                                class="w-14 h-14 rounded-full mx-auto"
                                                src="{{ $comment->user->profileImg ? Storage::url('look/profiles/' . $comment->user->profileImg) : asset('img/user.svg') }}"
                                                alt="Imagen de perfil de {{ $comment->user->username }}"></a>
                                    </div>
                                    <div class="flex-grow">
                                        <a href="{{ route('posts.index', $comment->user) }}"
                                            class="font-bold hover:underline">
                                            {{ $comment->user->username }}
                                        </a>
                                        <p class="break-words">{{ $comment->content }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center p-10">Se el primero en comentar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
