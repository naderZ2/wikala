<?php

namespace App\Http\Requests\Client\SpecialRequest;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\ResponsesTrait;
use Illuminate\Foundation\Http\FormRequest;

class SpecialRequestDetailsRequest extends FormRequest
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
            'special_requests_id' => 'required|exists:special_requests,id', // Must exist in the special_request table
            // 'user_id' => 'required|exists:users,id',                      // Must exist in the users table
            'type' => 'required|in:file,text',                   // Must be either 'file' or 'text'
            'content' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($this->type === 'file' && !$this->hasFile('content')) {
                        $fail(__('lang.content_must_be_file'));
                    }
    
                    if ($this->type === 'text') {
                        if (!is_string($value)) {
                            $fail(__('lang.content_must_be_string'));
                        } elseif (strlen($value) > 255) {
                            $fail(__('lang.content_max'));
                        }
                    }
                },
            ],                       // Optional, string, max 255 characters
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->failed(null,$validator->errors()->first()));
    }



    public function messages()
    {
        return [
            'special_requests_id.required' => __('lang.special_requests_id_required'),
            'special_requests_id.exists' => __('lang.special_requests_id_exists'),
            'user_id.required' => __('lang.user_id_required'),
            'user_id.exists' => __('lang.user_id_exists'),
            'file_or_text.required' => __('lang.file_or_text_required'),
            'file_or_text.in' => __('lang.file_or_text_in'),
            'content.string' => __('lang.content_string'),
            'content.max' => __('lang.content_max'),
        ];
    }
}