<?php

namespace App\Http\Requests\Auth;
use App\Traits\ResponsesTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'phone' => 'required',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
            'password' => 'required',
            "device_id"=>"sometimes|nullable"
        ];
    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'phone.required' => __('lang.phone_required'),
            'password.required' => __('lang.password_required'),
        ];
    }

    
}
