<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsValidValue implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type=$type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return($value >100 && $this->type=="percentage")?false:true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Value must be less than 100';
    }
}
