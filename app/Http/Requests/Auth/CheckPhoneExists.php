<?php

namespace App\Http\Requests\Auth;

use App\Traits\ResponsesTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckPhoneExists extends FormRequest
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
            'phone' => [
                'required',
                function ($attribute, $value, $fail) {
                    $candidates = \App\Models\User::phoneCandidates($value, $this->input('country_code'));
                    if (! \App\Models\User::whereIn('phone', $candidates)->exists()) {
                        $fail(__('lang.phone_not_registered'));
                    }
                },
            ],
            'country_code' => ['sometimes', 'nullable', 'string', 'regex:/^\+?[0-9]{1,6}$/'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(null, $this->failed($validator->errors()->first()));
    }

    public function messages(): array
    {
        return [
            'phone.exists' => __('lang.phone_not_registered'),
        ];
    }
}
