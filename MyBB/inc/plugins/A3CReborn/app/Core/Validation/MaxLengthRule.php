<?php

namespace A3C\Core\Validation;

class MaxLengthRule extends Rule
{
    /**
     * @var int
     */
    private int $maxLength;

    /**
     * MaxLengthRule constructor.
     * @param int $maxLength
     */
    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
    }

    /**
     * @param $value
     * @return bool
     */
    public function passes($value): bool
    {
        return strlen((string)$value) <= $this->maxLength;
    }

    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return "Value must have not more than $this->maxLength characters.";
    }
}
