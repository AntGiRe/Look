<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class FollowPost extends Component
{
    public $user;
    public $isFollowing;

    public function mount($user)
    {
        $this->isFollowing = $user->isFollowing(auth()->user());
    }

    public function render()
    {
        return view('livewire.follow-post');
    }

    public function follow()
    {
        if(!$this->user->isFollowing(auth()->user()))
        {
            $this->user->followers()->attach(auth()->user());
            $this->isFollowing = true;

            $this->dispatch('userFollowed', userId: $this->user->id);
        }
    }

    #[On('userFollowed')] 
    public function refreshComponent($userId)
    {
        if ($this->user->id == $userId) {
            $this->isFollowing = $this->user->isFollowing(auth()->user());
        }
    }
}
