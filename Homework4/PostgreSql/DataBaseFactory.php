<?php

namespace Homework4\PostgreSql;

use Homework4\Connection as AConnection;
use Homework4\DataBaseFactory as IDataBaseFactory;

class DataBaseFactory implements IDataBaseFactory
{
    /**
     * @inheritDoc
     */
    public function getConnection(): Connection
    {
        return new Connection();
    }

    public function getRecord(AConnection $connection, string $table, int $id): Record
    {
        return new Record($table, $id);
    }

    /**
     * @inheritDoc
     */
    public function getQueryBuilder(AConnection $connection, string $table): QueryBuilder
    {
        return new QueryBuilder($connection, $table);
    }
}
