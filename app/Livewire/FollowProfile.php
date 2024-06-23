<?php

namespace App\Livewire;

use Livewire\Component;

class FollowProfile extends Component
{
    public $user;
    public $isFollowing;

    public function mount($user)
    {
        $this->isFollowing = $user->isFollowing(auth()->user());
    }

    public function render()
    {
        return view('livewire.follow-profile');
    }

    public function follow()
    {
        if(!$this->user->isFollowing(auth()->user()))
        {
            $this->user->followers()->attach(auth()->user());
            $this->isFollowing = true;
        }
    }

    public function unfollow()
    {
        if($this->user->isFollowing(auth()->user()))
        {
            $this->user->followers()->detach(auth()->user());
            $this->isFollowing = false;
        }
    }
}
