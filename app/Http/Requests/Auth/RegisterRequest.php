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
                Password::min(8),
                    // ->mixedCase()        
                    // ->letters()   
                    // ->numbers()
                    // ->symbols(),     
            ],
            'otpCode' => 'required',
            'type' => 'sometimes|in:user,business',
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
            'email.unique'  => __('lang.email_unique'),
            'phone.unique'  => __('lang.phone_unique'),
            'password.required' => __('lang.password_required'),
            'password.confirmed' => __('lang.password_confirmed'),
            'password.min' => __('lang.password_min_8'),
            'password.mixedCase' => __('lang.password_mixed_case'),
            'password.letters' => __('lang.password_letters'),
            'password.numbers' => __('lang.password_numbers'),
            'password.symbols' => __('lang.password_symbols'),
        ];
    }
}
