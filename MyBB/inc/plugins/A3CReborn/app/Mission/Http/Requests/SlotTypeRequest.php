<?php

namespace A3C\Mission\Http\Requests;

use A3C\Core\Http\Request;

class SlotTypeRequest extends Request
{
    /**
     * @inheritDoc
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function validate()
    {

    }
}
