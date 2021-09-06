<?php
/*
 * Разработать и реализовать на PHP собственную ORM (Object-Relational Mapping — прослойку между базой данных и кодом) посредством абстрактной фабрики.
 * Фабрики будут реализовывать интерфейсы СУБД MySQLFactory, PostgreSQLFactory, OracleFactory.
 * Каждая фабрика возвращает объекты, характерные для конкретной СУБД. Пример компонентов:
 * DBConnection — соединение с базой,
 * DBRecrord — запись таблицы базы данных,
 * DBQueryBuiler — конструктор запросов к базе.
 *
 * Должна получиться гибкая система, позволяющая динамически менять базу данных и инкапсулирующая взаимодействие с
 * ней внутри продуктов конкретных фабрик. Углубляться в детали компонента необязательно — достаточно их наличия.
 */

require 'vendor/autoload.php';

use Homework4\DataBaseFactory;
use Homework4\MySql\DataBaseFactory as MySqlDataBaseFactory;
use Homework4\Oracle\DataBaseFactory as OracleDataBaseFactory;
use Homework4\PostgreSql\DataBaseFactory as PostgreSqlDataBaseFactory;

$separator = '***********************************' . PHP_EOL;

echo $separator;
workWithDb(new MySqlDataBaseFactory);
echo $separator;
workWithDb(new PostgreSqlDataBaseFactory);
echo $separator;
workWithDb(new OracleDataBaseFactory);
echo $separator;

function workWithDb(DataBaseFactory $factory)
{
    $connection = $factory->getConnection();
    $connection->connect('login', 'password');
    $connection->status();

    $record = $factory->getRecord($connection, 'users', rand(1, 100));
    $record->printData();

    $builder = $factory->getQueryBuilder($connection, 'users');
    $builder->addCriteria('WHERE deleted_at = null');
    $builder->executeQuery();

    $connection->disconnect();
    $connection->status();
}
