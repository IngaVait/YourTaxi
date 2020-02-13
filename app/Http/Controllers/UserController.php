<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $articles = Article::where('user_id', $user->id)->get();

        return view('user.article', ['articles' => $articles]);
    }

    public function profile(User $user)
    {
        $user = User::where('user_id', $user->id)->get();

        // return view when it's ready
    }

    public function type()
    {
        //give type
    }

}
