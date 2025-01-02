<?php

namespace App\Http\Requests;

use App\Models\Review;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_create');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'rate' => [
                'numeric',
                'required',
                'min:0',
                'max:5',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
