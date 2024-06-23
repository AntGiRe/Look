<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post)
    {
        if (!auth()->check()) {
            $this->isLiked = false;
        } else {
            $this->isLiked = $post->checkLikedByUser(auth()->user());
        }
        $this->likes = $post->likes->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }

    public function like()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        if($this->post->checkLikedByUser(auth()->user()))
        {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->id()
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }
}
