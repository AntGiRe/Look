<section>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center">
                <a href="{{ route('posts.index', $post->user) }}">
                    <img class="h-12 w-12 rounded-full object-cover"
                        src="{{ Storage::url('look/profiles/' . $post->user->profileImg) }}"
                        alt="{{ $post->user->username }}'s profile picture">
                </a>
                <a href="{{ route('posts.index', $post->user) }}" class="ml-3">
                    <p class="text-gray-900 leading-none">{{ $post->user->username }}</p>
                </a>
            </div>
            @auth
                <livewire:follow-post :user="$post->user" />
            @endauth
            @guest
                <a href="{{ route('login') }}"
                    class="bg-sky-600 text-white rounded-lg tracking-wide cursor-pointer px-8 py-2 font-bold hover:bg-sky-700 transition-all duration-200">Seguir</a>
            @endguest
        </div>
        <img class="w-full" src="{{ Storage::url('look/uploads/' . $post->image) }}" alt="{{ $post->title }}">
        <div class="px-4 py-2">
            <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
            <div class="flex space-x-4 mt-2">
                <button class="bg-red-500 text-white text-sm px-4 py-1 rounded-full hover:bg-red-600">Me gusta</button>
                <button
                    class="bg-gray-500 text-white text-sm px-4 py-1 rounded-full hover:bg-gray-600">Comentar</button>
            </div>
            <p class="text-gray-600 mt-4">{{ $post->description }}</p>
        </div>
    </div>
</section>
