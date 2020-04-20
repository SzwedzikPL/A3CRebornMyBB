<?php

namespace A3C\Mission\Http\Requests;

use A3C\Core\Http\Request;
use A3C\Core\Validation\MaxLengthRule;
use A3C\Core\Validation\StringRule;

class SlotTypeRequest extends Request
{
    /**
     * @inheritDoc
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validationRules(): array
    {
        return [
            'name' => [
                new StringRule(),
                new MaxLengthRule(255),
            ],
        ];
    }
}
