<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordSymbolsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return preg_match('/\p{Z}|\p{S}|\p{P}/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Поле :attribute должно содержать хоть один спецсимвол.';
    }
}
