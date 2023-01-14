<?php

namespace App\Http\Requests;

use App\Enums\SubscriberStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2'],
            'username' => ['required', 'min:2', 'unique:subscribers,username,' . $this->id],
            'status' => ['required', Rule::in(SubscriberStatus::ACTIVE, SubscriberStatus::BLOCKED)],
            'password' => ['sometimes', 'nullable', 'min:8'],
        ];
    }
}
