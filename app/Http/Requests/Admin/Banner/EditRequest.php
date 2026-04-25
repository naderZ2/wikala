<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id" => "required",
            'name' => "sometimes|nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,mov,avi,webm|max:51200",
            'link' => "sometimes|nullable",
            "category_id" => "sometimes|nullable"
        ];
    }
}
