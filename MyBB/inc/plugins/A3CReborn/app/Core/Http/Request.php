<?php

namespace A3C\Core\Http;

abstract class Request
{
    /**
     * @var array
     */
    protected array $errors = [];

    /**
     * @var array
     */
    protected array $input;

    /**
     * Request constructor.
     */
    public function __construct(array $input)
    {
        $this->input = $input;
    }

    /**
     * @return bool
     *
     * Determines if user is authorized to perform action
     */
    public abstract function authorize(): bool;

    /**
     * @return array
     */
    public function validationRules(): array
    {
        return [];
    }

    /**
     * @return mixed
     *
     * Validates input
     */
    public function validate()
    {
        $this->runValidator($this->validationRules());

        return empty($this->errors);
    }

    /**
     * @param array $ruleDefinitions
     */
    protected function runValidator(array $ruleDefinitions)
    {
        foreach ($ruleDefinitions as $field => $rules) {
            foreach ($rules as $rule) {
                if(!$rule->passes($this->input($field))) {
                    $this->errors[$field][] = $rule->errorMessage();
                }
            }
        }
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function input($key)
    {
        return $this->input[$key];
    }
}
