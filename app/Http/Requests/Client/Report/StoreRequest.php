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

    /**
     * Map client-friendly types (product, seller) to internal polymorphic types (ad, user).
     */
    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        if (is_array($validated) && isset($validated['reportable_type'])) {
            if ($validated['reportable_type'] === 'product') {
                $validated['reportable_type'] = 'ad';
            } elseif ($validated['reportable_type'] === 'seller') {
                $validated['reportable_type'] = 'user';
            }
        }

        return $validated;
    }
}
