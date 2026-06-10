<?php

namespace App\Http\Requests\Driver\Profile;

use App\Traits\ResponsesTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|nullable',
            'phone' => 'sometimes|nullable|unique:drivers,phone,'.auth()->id(),
            'email' => 'sometimes|nullable|unique:drivers,email,'.auth()->id(),
            'password' => 'sometimes|nullable',
            'image' => 'sometimes|nullable|file',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }

    
}
