<?php

namespace App\Http\Requests;

use App\Models\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_edit');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'size' => [
                'string',
                'required',
            ],
            'industries.*' => [
                'integer',
            ],
            'industries' => [
                'required',
                'array',
            ],
        ];
    }
}
