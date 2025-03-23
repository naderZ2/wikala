<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;

class EditProfileRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'sometimes|nullable',
            // 'password' => 'sometimes|nullable',
            'phone' => 'sometimes|nullable|unique:users,phone,'.auth()->id(),
            'phone' => 'sometimes|nullable|unique:users,phone,'.auth()->id(),
            'email' => 'sometimes|nullable|unique:users,email,'.auth()->id(),
            'image' => 'sometimes|nullable|file',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    public function messages(): array {
        return [
            'phone.unique'  => 'The phone Is found.',
        ];
    }
}
