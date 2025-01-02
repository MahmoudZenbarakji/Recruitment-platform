<?php

namespace App\Http\Requests;

use App\Models\Notification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
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
