<?php

namespace Homework4\PostgreSql;

use Homework4\AConnection;
use Homework4\DataBaseFactory as IDataBaseFactory;
use Homework4\QueryBuilder as AQueryBuilder;
use Homework4\Record as ARecord;

class DataBaseFactory implements IDataBaseFactory
{
    /**
     * @inheritDoc
     */
    public function getConnection(): AConnection
    {
        return new Connection();
    }

    //Вопрос! Почему тут нельзя поставить не абстрактный Connection
    //Ведь обычный Homework4\MySql\Connection экстендит Homework4\Connection?
    /**
     * @inheritDoc
     */
    public function getRecord(AConnection $connection, string $table, int $id): ARecord
    {
        return new Record($table, $id);
    }

    /**
     * @inheritDoc
     */
    public function getQueryBuilder(AConnection $connection, string $table): AQueryBuilder
    {
        return new QueryBuilder($connection, $table);
    }
}
