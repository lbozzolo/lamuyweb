<?php

namespace LamuyWeb\Models;

use LamuyWeb\Models\Entity as Entity;
use LamuyWeb\User;

class Comment extends Entity
{
    public $table = 'comments';

    public $fillable = [
        'body',
        'noticia_id',
        'user_id',
    ];

    public static $rules = [
        'body' => 'required|max:1000'
    ];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}