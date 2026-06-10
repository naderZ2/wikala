<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddNotificationRequest extends FormRequest
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
          'name_ar'=>'required',
          'name_en'=>'required',
          'description_ar'=>'required',
          'description_en'=>'required',
          'type' => 'required',
          'region_id' => 'sometimes|nullable',
          'product_id' => 'sometimes|nullable',
          'seller_id' => 'sometimes|nullable',
          'driver_id' => 'sometimes|nullable',
        ];
    }
}
