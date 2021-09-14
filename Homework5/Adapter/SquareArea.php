<?php

namespace Homework5\Adapter;

class SquareArea implements ISquare
{
    function squareArea(int $sideSquare)
    {
        return $sideSquare * 2;
    }
}
