<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $variant = $request->query('v');

        //si v viene si nada, es home
        if ($variant === 'home' || $variant === null) {
            $posts = Post::latest()->paginate(20);

            return view('home', [
                'posts' => $posts
            ]);
        } else {
            $ids = auth()->user()->followings->pluck('id')->toArray();

            $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

            return view('home', [
                'posts' => $posts
            ]);
        }
    }
}
