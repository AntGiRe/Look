<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Models\Post;

class LoadPosts extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $perPage = 5;
    public $type = "latest";

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function loadLatest()
    {
        $this->type = 'latest';
    }

    public function loadFollowing()
    {
        $this->type = 'following';
    }

    public function render()
    {
        if($this->type == 'latest') {
            $posts = Post::latest()->paginate($this->perPage);
        } else {
            $ids = auth()->user()->followings->pluck('id')->toArray();

            $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);
        }

        return view('livewire.load-posts', [
            'posts' => $posts,
        ]);
    }
}
