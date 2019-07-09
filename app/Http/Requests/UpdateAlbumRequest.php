<?php

namespace LamuyWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LamuyWeb\Models\Album;

class UpdateAlbumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Album::$rules;
    }
}
