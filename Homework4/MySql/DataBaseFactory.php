<?php

namespace Homework4\MySql;

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

    //Вопрос! Почему тут нельзя поставить не абстрактный Connection
    //Ведь обычный Homework4\MySql\Connection экстендит Homework4\Connection?
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
