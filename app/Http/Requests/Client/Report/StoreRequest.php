<?php

namespace App\Http\Requests\Client\Report;

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

    public function rules(): array
    {
        return [
            // 'reporter_id' => 'required|exists:users,id',
            'reportable_id' => 'required|integer',
            'reportable_type' => 'required|string|in:product,seller,user,ad',
            'report_option_id' => 'required|exists:report_options,id',
            'additional_notes' => 'nullable|string',
        ];
    }

    // No custom mapping, store exactly what is sent
}
