<?php

namespace A3C\Core\Http;

abstract class Request
{
    /**
     * @return bool
     *
     * Determines if user is authorized to perform action
     */
    public abstract function authorize(): bool;

    /**
     * @return mixed
     *
     * Validates input
     */
    public abstract function validate();
}
