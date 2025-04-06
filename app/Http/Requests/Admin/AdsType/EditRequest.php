<?php

namespace App\Http\Requests\Admin\AdsType;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:ads_type,id',
            'name' => 'required|string|max:100',
            'enable' => 'nullable|boolean',
        ];
    }
}
