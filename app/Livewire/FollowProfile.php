<?php

namespace App\Livewire;

use Livewire\Component;

class FollowProfile extends Component
{
    public $user;
    public $isFollowing;
    public $followers;

    public function mount($user)
    {
        if (!auth()->check()) {
            $this->isFollowing = false;
        } else {
            $this->isFollowing = $user->isFollowing(auth()->user());
        }
        $this->followers = $user->followers->count();
    }

    public function render()
    {
        return view('livewire.follow-profile');
    }

    public function follow()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        if(!$this->user->isFollowing(auth()->user()))
        {
            $this->user->followers()->attach(auth()->user());
            $this->isFollowing = true;
            $this->followers++;

            $this->dispatch('userFollowersUpdated', ['followers' => $this->followers]);
        }
    }

    public function unfollow()
    {
        if($this->user->isFollowing(auth()->user()))
        {
            $this->user->followers()->detach(auth()->user());
            $this->isFollowing = false;
            $this->followers--;

            $this->dispatch('userFollowersUpdated', ['followers' => $this->followers]);
        }
    }
}
