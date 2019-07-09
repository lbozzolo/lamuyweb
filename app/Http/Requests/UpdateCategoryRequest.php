<?php

namespace LamuyWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LamuyWeb\Models\Category;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Category::$rules;
    }
}
