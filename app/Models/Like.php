<?php

namespace Lamuy\Models;

use Lamuy\Models\Entity as Entity;
use Lamuy\User;

class Like extends Entity
{
    public $table = 'likes';

    public $fillable = [
        'noticia_id',
        'user_id',
    ];

    public static $rules = [
        '' => ''
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