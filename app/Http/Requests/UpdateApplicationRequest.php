<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_edit');
    }

    public function rules()
    {
        return [
            'job_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'start_review' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'closed_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
