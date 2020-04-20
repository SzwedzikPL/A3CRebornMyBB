<?php

namespace A3C\Core\Validation;

abstract class Rule
{
    public abstract function passes($value): bool;

    public abstract function errorMessage(): string;
}
