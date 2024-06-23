<div>
    @if (!auth()->check() ||$user->id !== auth()->user()->id)
        @if (!$isFollowing)
            <button wire:click="follow"
                class="bg-sky-600 text-white uppercase rounded-lg px-8 py-2 text-xs font-bold cursor-pointer hover:bg-sky-700 transition-all duration-200">
                Seguir
            </button>
        @else
            <button wire:click="unfollow"
                class="bg-slate-500 text-white uppercase rounded-lg px-8 py-2 text-xs font-bold cursor-pointer hover:bg-slate-600 transition-all duration-200">
                Siguiendo
            </button>
        @endif
    @endif
</div>
