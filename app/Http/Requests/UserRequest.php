<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            /*
               confirmed key word in password rule
               implies that password must be confirmed
               by sending its confirmation in attribute
               password_confirmation : $password
             */
            'password' => 'required|string|confirmed|min:8'
            // password_confirmation => laravel will search for it

        ];
    }
}
