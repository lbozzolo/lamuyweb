<?php

namespace LamuyWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LamuyWeb\Models\Noticia;

class UpdateNoticiaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Noticia::$rules;
    }
}
