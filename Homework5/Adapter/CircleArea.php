<?php

namespace Homework5\Adapter;

class CircleArea implements ICircle
{
    function circleArea(int $circumference)
    {
        return ($circumference * $circumference) / 4 * pi();
    }
}
