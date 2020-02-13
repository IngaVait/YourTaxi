<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    const BANNED_TYPE = 'banned';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'phone', 'surname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    public function banned()
    {
        return $this->type === self::BANNED_TYPE;
    }

}
