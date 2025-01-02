<?php

namespace App\Http\Requests;

use App\Models\Chat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chat_create');
    }

    public function rules()
    {
        return [
            'message' => [
                'string',
                'required',
            ],
            'is_read' => [
                'required',
            ],
        ];
    }
}
