<?php

namespace Homework4\MySql;

use Homework4\QueryBuilder as AQueryBuilder;

class QueryBuilder extends AQueryBuilder
{
    /**
     * @inheritDoc
     */
    public function executeQuery(): void
    {
        echo 'MySql execute query:' . PHP_EOL;
        echo 'SELECT * FROM ' . $this->table . ' ' . $this->criteries . PHP_EOL;
    }
}
