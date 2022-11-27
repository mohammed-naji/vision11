<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rule = 'required|image|mimes:png,jpg,jpeg|max:2048';
        if($this->method() == 'PUT') {
            $rule = 'nullable|image|mimes:png,jpg,jpeg|max:2048';
        }

        return [
            'title' => 'required|min:4',
            'image' => $rule,
            'body' => 'required'
        ];
    }
}
