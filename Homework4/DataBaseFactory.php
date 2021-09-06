<?php

namespace Homework4;

interface DataBaseFactory
{
    /**
     * @return Connection
     */
    public function getConnection(): Connection;

    /**
     * @param Connection $connection
     * @param string $table
     * @param int $id
     * @return Record
     */
    public function getRecord(Connection $connection, string $table, int $id): Record;

    /**
     * @param Connection $connection
     * @param string $table
     * @return QueryBuilder
     */
    public function getQueryBuilder(Connection $connection, string $table): QueryBuilder;
}
