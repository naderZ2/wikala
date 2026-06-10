<?php

namespace App\Http\Requests\Client\Chat;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'receiver_id'   => 'required|exists:users,id',
            'message'       => 'required',
            'message_type'  => 'required|in:text,file,audio',
        ];  
    }

    public function messages(): array
    {
        return [
            'receiver_id.required'   => __('lang.receiver_required'),
            'receiver_id.exists'     => __('lang.receiver_not_found'),
            'message.required'       => __('lang.message_required'),
            'message.string'         => __('lang.message_must_be_string'),
            'message_type.required'  => __('lang.message_type_required'),
            'message_type.in'        => __('lang.invalid_message_type'),
        ]; 
    }
}
