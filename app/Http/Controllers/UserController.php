<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
//    skirta tam atvejui, jei bus keli administratoriai, tada galima rodyti kas yra straipsnio autorius, ir filtruoti straipsnius pagal tai.

    public function index(User $user)
    {
        $articles = Article::where('user_id', $user->id)->get();

        return view('user.article', ['articles' => $articles]);
    }

}
