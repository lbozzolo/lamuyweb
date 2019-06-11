<?php

namespace Lamuy\Models;

use Lamuy\Models\Entity as Entity;
use Lamuy\User;

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