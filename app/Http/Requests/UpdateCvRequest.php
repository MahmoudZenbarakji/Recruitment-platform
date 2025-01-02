<?php

namespace App\Http\Requests;

use App\Models\Cv;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCvRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cv_edit');
    }

    public function rules()
    {
        return [
            'cv' => [
                'required',
            ],
            'is_main' => [
                'required',
            ],
        ];
    }
}
