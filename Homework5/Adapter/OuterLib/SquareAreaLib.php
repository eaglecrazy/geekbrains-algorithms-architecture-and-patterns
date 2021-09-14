<?php

namespace Homework5\Adapter\OuterLib;

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = $diagonal ** 2;

        return $area;
    }
}
