<?php

namespace Homework4\MySql;

use Homework4\Record as ARecord;

class Record extends ARecord
{
    /**
     * @inheritDoc
     */
    public function printData(): void
    {
        echo 'MySql record: ' . $this->entity . '-' . $this->number . PHP_EOL;
    }
}
