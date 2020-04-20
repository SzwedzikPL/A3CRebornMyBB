<?php

namespace A3C\Decoration\Repositories;

use A3C\Decoration\Model\Decoration;
use A3C\Core\Repository;

class DecorationRepository extends Repository
{
    const TABLE_NAME =  PLUGIN_PREFIX . 'decorations';

    /**
     * @param Decoration $decoration
     * @return Decoration
     *
     * Saves newly created decoration in repository and returns object with update id field
     */
    public function save(Decoration $decoration): Decoration
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
            return new Decoration((int)$row[0], $row[1], $row[2], $row[3], (int)$row[4], $row[5]);
        }, $results) ?? [];
    }

    /**
     * @param int $id
     * @return Decoration|null
     *
     * Get slot type with given id
     */
    public function getById(int $id): ?Decoration
    {

    }

    /**
     * @param Decoration $decoration
     * @param string $name
     *
     * Updates slot type with given name
     */
    public function update(Decoration $decoration, string $name)
    {

    }

    /**
     * @param Decoration $decoration
     *
     * Removes slot type permanently
     */
    public function delete(Decoration $decoration)
    {

    }

    /**
     * Creates database table
     */
    public function createTable()
    {
        $this->db->write_query("
            CREATE TABLE " . TABLE_PREFIX . self::TABLE_NAME . " (
                id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                icon VARCHAR(255) NOT NULL,
                color VARCHAR(7) NULL,
                decoration_group SMALLINT NULL,
                description TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL
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
