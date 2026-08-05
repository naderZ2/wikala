<?php

namespace App\Http\Requests\Auth;

use App\Traits\ResponsesTrait;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ResetPasswordRequest extends FormRequest
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
    protected $stopOnFirstFailure=true;

    protected function prepareForValidation(): void
    {
        if ($this->filled('phone')) {
            $this->merge([
                'phone' => app(\App\Services\ArriveWhatsService::class)
                    ->normalizePhoneNumber($this->input('phone'), $this->input('country_code')),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|exists:users,phone',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'otpCode' => 'required',
            'password' => [
                'required','confirmed',
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
        throw new HttpResponseException($this->failed($validator->errors()->first()));
    }

    
}
