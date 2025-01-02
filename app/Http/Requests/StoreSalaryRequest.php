<?php

namespace App\Http\Requests;

use App\Models\Salary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salary_create');
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
