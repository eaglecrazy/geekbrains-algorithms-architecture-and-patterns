<?php

namespace homework4;

interface DataBaseFactory
{
    public function createConnection();
    public function createRecord();
    public function createQueryBuilder();
}