<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'article_id'];

    protected $casts = ['user_id' => 'integer', 'article_id' => 'integer'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
