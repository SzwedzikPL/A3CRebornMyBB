<?php

namespace A3C\Mission\Repositories;

use A3C\Mission\Model\SlotType;

class SlotTypeRepository
{
    /**
     * @param SlotType $slotType
     * @return SlotType
     *
     * Stores newly created slot type and returns object with update id field
     */
    public function store(SlotType $slotType): SlotType
    {

    }

    /**
     * @return array|null
     *
     * Gets all slot types
     */
    public function getAll(): array
    {
        return [];
    }

    /**
     * @param int $id
     * @return SlotType|null
     *
     * Get slot type with given id
     */
    public function getById(int $id): ?SlotType
    {

    }

    /**
     * @param SlotType $slotType
     * @param string $name
     *
     * Updates slot type with given name
     */
    public function update(SlotType $slotType, string $name)
    {

    }

    /**
     * @param SlotType $slotType
     *
     * Removes slot type permanently
     */
    public function delete(SlotType $slotType)
    {

    }
}
