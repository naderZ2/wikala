<?php

namespace App\Http\Requests\Client;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;
use Illuminate\Foundation\Http\FormRequest;

class CheckClientExistsRequest extends FormRequest
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
            'email' => 'required|string|email',
            'phone' => 'required',
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'phone.unique'  => __('lang.phone_unique'),
            'email.unique'  => __('lang.email_unique'),
        ];
    }
}
