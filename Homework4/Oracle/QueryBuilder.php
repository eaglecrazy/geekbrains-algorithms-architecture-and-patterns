<?php

namespace Homework4\Oracle;

use Homework4\QueryBuilder as AQueryBuilder;

class QueryBuilder extends AQueryBuilder
{
    /**
     * @inheritDoc
     */
    public function executeQuery(): void
    {
        echo 'Oracle execute query:' . PHP_EOL;
        echo 'SELECT * FROM ' . $this->table . ' ' . $this->criteries . PHP_EOL;
    }
}
