<?php

namespace App\Http\Requests;

use App\Models\Salary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_edit');
    }

    public function rules()
    {
        return [
            'range' => [
                'string',
                'required',
            ],
            'is_active' => [
                'required',
            ],
        ];
    }
}
