<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Timestamp implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_numeric($value) && $value <= PHP_INT_MAX && $value >= ~PHP_INT_MAX) {
            $fail(__('The :attribute must be a timestamp.'));
        }
    }
}
