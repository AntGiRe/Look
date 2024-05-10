<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $request->request->add([
            'username' => Str::slug($request->get('username')),
        ]);

        $request->validate([
            'name' => 'required|max:64',
            'username' => 'required|max:24|unique:users|min:3',
            'email' => 'required|email|max:64|unique:users',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->get('name'),
            'username' => Str::slug($request->get('username')),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        auth()->attempt($request->only('email', 'password'));

        //Redirect to the posts index
        return redirect()->route('posts.index');
    }
}
