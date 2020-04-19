<?php

namespace A3C\Core;

abstract class Repository
{
    /**
     * @var
     */
    protected $db;

    /**
     * Repository constructor.
     * @param \DB_MySQLi $db
     */
    public function __construct(\DB_MySQLi $db)
    {
        $this->db = $db;
    }

    abstract public function createTable();

    abstract public function dropTable();

    abstract public function tableExists(): bool;
}
