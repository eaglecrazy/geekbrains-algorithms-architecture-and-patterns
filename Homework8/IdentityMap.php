<?php

namespace Model\Repository;

class IdentityMap
{
    protected $map = [];

    protected function setEntity(int $id, $object): void
    {
        $this->map[$id] = $object;
    }

    protected function getEntity(int $id)
    {
        if (isset($this->map[$id])) {
            return $this->map[$id];
        }

        return null;
    }
}
