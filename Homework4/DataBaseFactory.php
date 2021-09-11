<?php

namespace Homework4;

interface DataBaseFactory
{
    /**
     * @return AConnection
     */
    public function getConnection(): AConnection;

    /**
     * @param AConnection $connection
     * @param string $table
     * @param int $id
     * @return Record
     */
    public function getRecord(AConnection $connection, string $table, int $id): Record;

    /**
     * @param AConnection $connection
     * @param string $table
     * @return QueryBuilder
     */
    public function getQueryBuilder(AConnection $connection, string $table): QueryBuilder;
}
