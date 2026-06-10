<?php

namespace App\Http\Requests\Client\Password;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Password;
use App\Traits\ResponsesTrait;
use Illuminate\Foundation\Http\FormRequest;

class CheckRequest extends FormRequest
{
    use ResponsesTrait;
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
     * @return array
     */
    public function rules()
    {
        return [
            'password' => [
                'required','confirmed',
                Password::min(8) 
                    ->mixedCase()        
                    ->letters()   
                    ->numbers()
                    ->symbols(),     
            ],
            'old_password' => [
                'required',
                Password::min(8) 
                    ->mixedCase()        
                    ->letters()   
                    ->numbers()
                    ->symbols(),  
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'password.required'  => 'The password Is required.',
            'password.regex' => 'Password must include an uppercase letter, a lowercase letter, a number, and a special character.',
            'old_password.required'  => 'The old password Is required.',
        ];
    }
}
