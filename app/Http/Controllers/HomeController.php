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
        $services = [
            [
                'url' => url('storage/images/images(3).jpg'),
                'job' => 'Laiku!',
                'description' => 'Visada Jums patogiu metu, Kviesk Taksi Greitai. Pasirink Tarifą Pats! Kaina Nuo 0,29 Eur/km. '
            ],
            [
                'url' => url('storage/images/images(2).jpg'),
                'job' => 'Jei skubate',
                'description' => 'Atvykstame greičiau už vėją! Greitas Ir Patogus Taksi Iškvietimas. Skambink į eTAKSI.'
            ], [
                'url' => url('storage/images/images(3).jpg'),
                'job' => 'Planuokite',
                'description' => 'Gaukite nuolaidą ilgai kelionei. Pasirink Tarifą Pats! Kaina Nuo 0,29 Eur/km.'
            ],
        ];
        return view('index', ['services' => $services]);
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
