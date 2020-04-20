<?php

namespace A3C\Core\Validation;

class StringRule extends Rule
{
    /**
     * @param $value
     * @return bool
     */
    public function passes($value): bool
    {
        return is_string($value);
    }

    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return 'Value must be string.';
    }
}
