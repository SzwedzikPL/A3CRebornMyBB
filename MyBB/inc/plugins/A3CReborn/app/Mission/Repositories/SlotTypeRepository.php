<?php

namespace A3C\Mission\Repositories;

use A3C\Mission\Model\SlotType;
use A3C\Core\Repository;

class SlotTypeRepository extends Repository
{
    const TABLE_NAME = PLUGIN_PREFIX . 'slot_types';

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
        $results = $this->db->simple_select(self::TABLE_NAME, '*')->fetch_all();

        return array_map(function($row) {
            return new SlotType($row[1], (int)$row[0]);
        }, $results) ?? [];
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

    /**
     * Creates database table
     */
    public function createTable()
    {
        $this->db->write_query("
            CREATE TABLE " . TABLE_PREFIX . self::TABLE_NAME . " (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ");
    }

    /**
     * Drops database table
     */
    public function dropTable()
    {
        $this->db->drop_table(self::TABLE_NAME);
    }

    /**
     * @return bool
     *
     * Check that database table exists
     */
    public function tableExists(): bool
    {
        return $this->db->table_exists(self::TABLE_NAME);
    }
}
