<?php

namespace Lamuy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lamuy\Models\Type;

class UpdateTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Type::$rules;
    }
}
