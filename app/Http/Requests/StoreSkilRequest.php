<?php

namespace App\Http\Requests;

use App\Models\Skil;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSkilRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('skil_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:skils',
            ],
        ];
    }
}
