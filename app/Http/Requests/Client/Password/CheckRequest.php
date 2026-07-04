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
        $rules = [
            'old_password' => 'required|string',
        ];

        // Determine if they used new_password or password
        $passwordField = $this->has('new_password') ? 'new_password' : 'password';

        // Check if there is a custom confirm field (like confirm_new_password or confirm_password)
        $confirmField = null;
        if ($this->has('confirm_new_password')) {
            $confirmField = 'confirm_new_password';
        } elseif ($this->has('confirm_password')) {
            $confirmField = 'confirm_password';
        }

        $passwordRules = [
            'required',
            Password::min(8) 
                ->mixedCase()        
                ->letters()   
                ->numbers()
                ->symbols(),     
        ];

        if ($confirmField) {
            $passwordRules[] = "same:{$confirmField}";
        } else {
            $passwordRules[] = 'confirmed';
        }

        $rules[$passwordField] = $passwordRules;

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'password.required'  => __('lang.password_required'),
            'password.confirmed' => __('lang.password_confirmed'),
            'password.same'      => __('lang.password_confirmed'),
            'new_password.required'  => __('lang.password_required'),
            'new_password.confirmed' => __('lang.password_confirmed'),
            'new_password.same'      => __('lang.password_confirmed'),
            'old_password.required'  => __('lang.old_password_required'),
        ];
    }
}
