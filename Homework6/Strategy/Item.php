<?php

namespace Homework6\Strategy;

class Item
{
    public string $title;
    public int    $cost;

    public function __construct(string $title, int $cost)
    {
        $this->title = $title;
        $this->cost  = $cost;
    }
}
