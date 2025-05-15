<?php

namespace App\Http\Requests\Admin\SpecialRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class SpecialRequestDetailsRequest extends FormRequest
{
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
            'special_requests_id' => 'required|exists:special_requests,id', // Must exist in the special_request table
            'user_id' => 'required',                      // Must exist in the users table
            'type' => 'required|in:file,text',                   // Must be either 'file' or 'text'
            'content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->type === 'file' && !$this->hasFile('content')) {
                        $fail('The content must be a valid file when type is file.');
                    }

                    if ($this->type === 'text') {
                        if (!is_string($value)) {
                            $fail('The content must be a string when type is text.');
                        } elseif (strlen($value) > 255) {
                            $fail('The content may not be greater than 255 characters.');
                        }
                    }
                },
            ], // Optional, string, max 255 characters
        ];
    }

    public function messages()
    {
        return [
            'special_requests_id.required' => 'The special request ID is required.',
            'special_requests_id.exists' => 'The selected special request does not exist.',
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'file_or_text.required' => 'You must specify whether it is a file or text.',
            'file_or_text.in' => 'The file_or_text field must be either "file" or "text".',
            'content.string' => 'The content must be a valid string.',
            'content.max' => 'The content may not be greater than 255 characters.',
        ];
    }
}
