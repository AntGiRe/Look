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
                <livewire:follow-post :user="$post->user" :key="'follow-' . $post->id"/>
            @endauth
            @guest
                <a href="{{ route('login') }}"
                    class="bg-sky-600 text-white rounded-lg tracking-wide cursor-pointer px-8 py-2 font-bold hover:bg-sky-700 transition-all duration-200">Seguir</a>
            @endguest
        </div>
        <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
            <img class="w-full" src="{{ Storage::url('look/uploads/' . $post->image) }}" alt="{{ $post->title }}"></a>
        <div class="px-4 py-2">
            <div class="flex items-center justify-between">
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                </a>
                <div class="flex space-x-3">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                        </svg></a>
                    <livewire:like-post :post="$post" :key="'like-' . $post->id"/>
                </div>
            </div>
            <p class="text-gray-600 mt-4"><a class="font-semibold mr-1 hover:underline"
                    href="{{ route('posts.index', $post->user) }}">{{ $post->user->username }}</a>
                {{ $post->description }}</p>
        </div>
    </div>
</section>
