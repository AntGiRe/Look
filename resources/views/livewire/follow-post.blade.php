<div>
    @if (!$isFollowing && (!auth()->user() || !$user->isFollowing(auth()->user())))
        <button wire:click="follow"
            class="bg-sky-600 text-white uppercase rounded-lg px-8 py-2 text-xs font-bold cursor-pointer hover:bg-sky-700 transition-all duration-200">
            Seguir
        </button>
    @endif
</div>
