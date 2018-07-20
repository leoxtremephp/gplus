<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class EmailOnlineRule implements Rule
{

    protected $rule = 'email_online';

    /**
     * Create a new rule instance.
     *
     * @param $value
     */
    public function __construct($value)
    {
        Log::info('We have a value! : ' . $value);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        Log::info("{$attribute} : {$value}");

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
