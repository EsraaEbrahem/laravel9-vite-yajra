<?php

namespace App\Http\Requests;

use App\Enums\BlogStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title' => ['required', 'min:5'],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in(BlogStatus::DRAFT, BlogStatus::PUBLISHED)],
            'image' => [ 'nullable','file', 'image', 'max:7168'],
            'publish_date' => ['required','date']
        ];
    }
}
