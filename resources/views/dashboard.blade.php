@extends('layouts.app')

@section('title', $user->name . ' (@' . $user->username . ')')

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-8/12 flex flex-col items-center md:flex-row">
            <div class="w-full md:w-6/12 lg:w-6/12 px-5">
                <img src="{{ $user->profileImg ? Storage::url('look/profiles/' . $user->profileImg) : asset('img/user.svg') }}"
                    alt="Imagen usuario" class="w-24 h-24 md:w-48 md:h-48 rounded-full mx-auto">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center py-2 md:py-10 md:items-start">

                <div class="flex items-center justify-center gap-2">
                    <p class="text-gray-700 text-2xl font-semibold">{{ $user->username }}</p>
                    <svg data-tooltip-target="tooltip-verified" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-1 w-6 h-6 text-sky-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <div id="tooltip-verified" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Verificado
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    @auth
                        <div class="ml-5">
                            @if ($user->id === auth()->user()->id)
                                <div class="flex flex-row gap-4 items-center">
                                    <a href="{{ route('profile.index') }}"
                                        class="tracking-wide cursor-pointer px-8 py-2 font-bold text-sx rounded bg-slate-200 transition hover:bg-slate-300">Editar
                                    </a>
                                    <a href="{{ route('account.index') }}" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endauth
                </div>

                <section class="flex flex-row mt-5 gap-5 mb-3 ">
                    <p class="text-gray-800 text-normal font-bold">
                        {{ $user->posts->count() }}
                        <span class="font-normal">publicaciones</span>
                    </p>

                    <p class="text-gray-800 text-normal font-bold">
                        {{ $user->followers->count() }}
                        <span class="font-normal"> @choice('seguidor|seguidores', $user->followers->count())</span>
                    </p>

                    <p class="text-gray-800 text-normal font-bold">
                        {{ $user->followings->count() }}
                        <span class="font-normal">seguidos</span>
                    </p>
                </section>

                <p class="font-bold">{{ $user->name }}</p>

                <p class="mb-2">{{ $user->presentation }} Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
                    quis sapien euismod, maximus purus vitae.</p>

                @auth
                    <livewire:follow-profile :user="$user" />
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-sky-600 text-white rounded-lg tracking-wide cursor-pointer px-8 py-2 font-bold hover:bg-sky-700 transition-all duration-200">Seguir</a>
                @endguest
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">

        <x-post-list :posts="$posts" />

    </section>
@endsection
