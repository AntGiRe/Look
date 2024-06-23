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

    #[On('userFollowersUpdated')] 
    public function refreshComponent($followers)
    {
        $this->followers = $followers['followers'];
    }

}
