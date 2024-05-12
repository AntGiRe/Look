<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image
        ]);

        return redirect()->route('posts.index', ['user' => $request->user()]);
    }
}
