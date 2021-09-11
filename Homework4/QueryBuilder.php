<?php

namespace Homework4;

abstract class QueryBuilder
{
    protected AConnection $connection;
    protected string      $table;
    protected string      $criteries = '';

    /**
     * @param AConnection $connection
     * @param string $table
     */
    public function __construct(AConnection $connection, string $table)
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
