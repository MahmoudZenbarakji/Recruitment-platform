<?php

namespace App\Http\Requests;

use App\Models\Chat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateChatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chat_edit');
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
