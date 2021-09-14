<?php

namespace Homework5\Adapter;

use Homework5\Adapter\OuterLib\CircleAreaLib;

class CircleAreaAdapter implements ICircle
{
    private CircleAreaLib $circle;

    public function __construct(CircleAreaLib $circle)
    {
        $this->circle = $circle;
    }

    function circleArea(int $circumference)
    {
        return $this->circle->getCircleArea($circumference);
    }
}
