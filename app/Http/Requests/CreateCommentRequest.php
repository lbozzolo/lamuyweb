<?php

namespace LamuyWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LamuyWeb\Models\Comment;

class CreateCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Comment::$rules;
    }
}
