<?php

namespace Homework4;

abstract class QueryBuilder
{
    protected Connection $connection;
    protected string     $table;
    protected string     $criteries = '';

    /**
     * @param Connection $connection
     * @param string $table
     */
    public function __construct(Connection $connection, string $table)
    {
        $this->connection = $connection;
        $this->table      = $table;
    }

    /**
     * @return void
     */
    abstract public function executeQuery(): void;

    /**
     * @param string $criteria
     */
    public function addCriteria(string $criteria): void
    {
        $this->criteries .= $criteria;
    }
}
