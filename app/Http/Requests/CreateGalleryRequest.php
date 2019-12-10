<?php

namespace LamuyWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LamuyWeb\Models\Gallery;

class CreateGalleryRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Gallery::$rules;
    }
}