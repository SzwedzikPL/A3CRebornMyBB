<?php

namespace A3C\Core\Validation;

class UniqueInDatabaseRule extends Rule
{
    /**
     * @var string
     */
    private string $table;

    /**
     * @var string
     */
    private string $field;

    /**
     * UniqueInDatabaseRule constructor.
     * @param string $table
     * @param string $field
     */
    public function __construct(string $table, string $field)
    {
        $this->table = $table;
        $this->field = $field;
    }

    /**
     * @param $value
     * @return bool
     */
    public function passes($value): bool
    {
        // #TODO
    }

    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return "Value must be unique in database.";
    }
}
