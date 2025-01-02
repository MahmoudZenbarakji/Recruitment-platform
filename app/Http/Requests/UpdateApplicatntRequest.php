<?php

namespace App\Http\Requests;

use App\Models\Applicatnt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicatntRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applicatnt_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'education_level' => [
                'required',
            ],
            'experience_year' => [
                'string',
                'required',
            ],
            'salary_id' => [
                'required',
                'integer',
            ],
            'nationality_id' => [
                'required',
                'integer',
            ],
            'gender' => [
                'required',
            ],
            'other_phone_number' => [
                'string',
                'nullable',
            ],
            'birthday' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cvs.*' => [
                'integer',
            ],
            'cvs' => [
                'required',
                'array',
            ],
            'image' => [
                'required',
            ],
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'required',
                'array',
            ],
        ];
    }
}
