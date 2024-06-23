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
                                <form class="cursor-pointer hover:text-red-600 transition" id="delete-post-{{ $post->id }}"
                                    action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="hidden" />
                                    <svg onclick="document.getElementById('delete-post-{{ $post->id }}').submit()"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </form>
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

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth

                    @if (session('success'))
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="flex items-center mb-5 ">
                            <div class="w-14 flex-shrink-0 mr-4">
                                <img class="w-14 h-14 rounded-full mx-auto"
                                    src="{{ auth()->user()->profileImg ? Storage::url('look/profiles/' . auth()->user()->profileImg) : asset('img/user.svg') }}"
                                    alt="Imagen de perfil de {{ auth()->user()->username }}">
                            </div>
                            <div class="flex-grow">
                                <textarea id="comment" name="comment" placeholder="Comenta en el post de {{ $post->user->username }}"
                                    class="border p-3 w-full rounded-lg @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded" />
                    </form>
                @endauth

                <div class="bg-white shadow mg-5 max-h-96 overflow-y-scroll mt-10 hide-scrollbar">
                    @if ($post->comments->count() > 0)
                        @foreach ($post->comments as $comment)
                            <div class="p-5 border-gray-300 border-b">
                                <div class="flex items-center">
                                    <div class="w-14 flex-shrink-0 mr-4">
                                        <a href="{{ route('posts.index', $comment->user) }}"><img class="w-14 h-14 rounded-full mx-auto"
                                            src="{{ $comment->user->profileImg ? Storage::url('look/profiles/' . $comment->user->profileImg) : asset('img/user.svg') }}"
                                            alt="Imagen de perfil de {{ $comment->user->username }}"></a>
                                    </div>
                                    <div class="flex-grow">
                                        <a href="{{ route('posts.index', $comment->user) }}" class="font-bold hover:underline">
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
