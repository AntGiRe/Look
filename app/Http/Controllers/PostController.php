<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Faker\Core\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(20);

        foreach ($posts as $post)
        {
            $post->image = Storage::url('look/uploads/' . $post->image);
        }

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
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

    public function show(User $user, Post $post)
    {
        //cada post tiene imagen en cloudflare hay que recuperar enlace
        $post->image = Storage::url('look/uploads/' . $post->image);

        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $image_path = 'uploads/' . $post->image;

        //comprobar si existe la imagen en cloudflare y eliminarla
        if (Storage::exists($image_path)) {
            Storage::delete($image_path);
        }

        $post->delete();

        return redirect()->route('posts.index', auth()->user());
    }
}
