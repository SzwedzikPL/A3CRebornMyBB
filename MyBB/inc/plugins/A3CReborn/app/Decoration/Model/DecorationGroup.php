<?php

namespace A3C\Decoration\Model;

class DecorationGroup
{
    /**
     * @var int|null
     */
    public ?int $id;

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public array $levels;

    /**
     * DecorationGroup constructor.
     * @param int|null $id
     * @param string $name
     * @param array $levels
     */
    public function __construct(?int $id = null, string $name, array $levels)
    {
        $this->id = $id;
        $this->name = $name;
        $this->levels = $levels;
    }
}
