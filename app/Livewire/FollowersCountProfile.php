<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class FollowersCountProfile extends Component
{
    public $user;
    public $followers;

    public function mount($user)
    {
        $this->followers = $user->followers->count();
    }

    public function render()
    {
        return view('livewire.followers-count-profile');
    }

    #[On('userFollowed')] 
    public function refreshComponent($userId)
    {
        if ($this->user->id == $userId) {
            $this->followers++;
        }
    }

    #[On('userUnfollowed')] 
    public function followerMinus($userId)
    {
        if ($this->user->id == $userId) {
            $this->followers--;
        }
    }
}
