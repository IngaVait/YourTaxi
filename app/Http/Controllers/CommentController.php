<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article, Comment $comment)
    {

        $comments = $comment
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->select('comments.*', 'users.name')
            ->where('comments.article_id', $article->id)
            ->get();

        return response($comments, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $article)
    {
        $data = $request->validate([
            'content' => 'required|string'
        ]);

        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->user_id = auth()->user()->id;
        $comment->article_id = $article;
        $comment->save();

        $comment->load('author');

        return response($comment, 200);
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'content' => 'required|string'
        ]);

        $comment->content = $data['content'];
        $comment->save();

        $comment->load('author');

        return response($comment, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response(null, 204);
    }
}
