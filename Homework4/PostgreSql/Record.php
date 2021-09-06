<?php

namespace Homework4\PostgreSql;

use Homework4\Record as ARecord;

class Record extends ARecord
{
    /**
     * @inheritDoc
     */
    public function printData(): void
    {
        echo 'PostgreSql record: ' . $this->entity . '-' . $this->number . PHP_EOL;
    }
}
