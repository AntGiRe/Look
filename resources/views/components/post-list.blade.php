<div>
    @if ($posts->count())
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-1 md:gap-6">
            @foreach ($posts as $post)
                <div class="relative group w-full h-full">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}"
                        class="block w-full h-full">
                        <img src="{{ $post->image }}" alt="Imagen del post {{ $post->title }}"
                            class="w-full h-full object-cover">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 flex gap-10 items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="flex flex-row gap-2 justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="white" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                <span class="text-white text-lg font-bold">{{ $post->likes->count() }}</span>
                            </div>
                            <div class="flex flex-row gap-2 justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="white" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>

                                <span class="text-white text-lg font-bold">{{ $post->comments->count() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
    @endif
</div>
