<?php

namespace A3C\Decoration\Model;

class Decoration
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
    public string $icon;

    /**
     * @var string|null
     */
    public string $color;

    /**
     * @var int|null
     */
    public string $group;

    /**
     * @var string|null
     */
    public string $description;

    /**
     * Decoration constructor.
     * @param int|null $id
     * @param string $name
     * @param string $icon
     * @param string|null $color
     * @param int|null $group
     * @param string|null $description
     */
    public function __construct(?int $id = null, string $name, string $icon, ?string $color, ?int $group, ?string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->color = $color;
        $this->group = $group;
        $this->description = $description;
    }
}
