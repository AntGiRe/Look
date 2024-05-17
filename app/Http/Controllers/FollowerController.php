<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        //TODO comprobar si usuario ya sigue a este usuario
        $user->followers()->attach(auth()->user());

        return back();
    }

    public function destroy(User $user)
    {
        $user->followers()->detach(auth()->user());

        return back();
    }
}
