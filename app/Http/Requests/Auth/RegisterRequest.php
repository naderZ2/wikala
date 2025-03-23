<?php

namespace App\Http\Requests\Auth;

use App\Traits\ResponsesTrait;
use Illuminate\Validation\Rules\Password;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
    protected $stopOnFirstFailure = true;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            // 'email' => 'required',
            'phone' => 'required',
            'password' => [
                'required',
                Password::min(8) 
                    ->mixedCase()        
                    ->letters()   
                    ->numbers()
                    ->symbols(),     
            ],
            'otpCode' => 'required',
            'device_id' => 'sometimes|nullable',
            // 'country_id' => 'required',
            // 'gender' => 'required',
            // 'social_status' => 'required',
            // 'birth_date' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));    }

    public function messages(): array {
        return [
            'email.unique'  => 'The email Is found.',
            'phone.unique'  => 'The phone Is found.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'The passwords do not match.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.mixedCase' => 'Password must include both uppercase and lowercase letters.',
            'password.letters' => 'Password must contain at least one letter.',
            'password.numbers' => 'Password must contain at least one number.',
            'password.symbols' => 'Password must include at least one special character.',
        ];
    }
}
