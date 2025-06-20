<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required_without_all:description,number_of_likes|string|max:100',
            'description' => 'required_without_all:title,number_of_likes|string|max:500',
            'number_of_likes' => 'required_without_all:title,description|integer'
        ];
    }
}
