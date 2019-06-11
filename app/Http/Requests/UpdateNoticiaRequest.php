<?php

namespace Lamuy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lamuy\Models\Noticia;

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
