<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function admin()
    {
        $users = User::join('articles', 'users.id', '=', 'articles.user_id')
            ->select(DB::raw('count(articles.id) as articles_count'), 'users.*')
            ->groupBy('id')
            ->get();
        return view('admin.admin', ['users' => $users]);
    }
}
