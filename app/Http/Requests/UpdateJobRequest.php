<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'type_id' => [
                'required',
                'integer',
            ],
            'salary_id' => [
                'required',
                'integer',
            ],
            'experiences_year' => [
                'required',
            ],
            'company_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'closed_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
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
