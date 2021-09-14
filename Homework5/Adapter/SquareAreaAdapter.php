<?php

namespace Homework5\Adapter;

use Homework5\Adapter\OuterLib\SquareAreaLib;

class SquareAreaAdapter implements ISquare
{
    private SquareAreaLib $square;

    public function __construct(SquareAreaLib $square)
    {
        $this->square = $square;
    }

    function squareArea(int $sideSquare)
    {
        return $this->square->getSquareArea($sideSquare);
    }
}
