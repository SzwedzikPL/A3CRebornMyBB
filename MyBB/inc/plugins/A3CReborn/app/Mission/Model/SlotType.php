<?php

namespace A3C\Mission\Model;

class SlotType
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
     * SlotType constructor.
     * @param string $name
     * @param int|null $id
     */
    public function __construct(string $name, ?int $id = null)
    {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}
