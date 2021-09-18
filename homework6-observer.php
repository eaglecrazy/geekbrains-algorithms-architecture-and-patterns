<?php
/*
Наблюдатель: есть сайт HandHunter.gb. На нем работники могут подыскать себе вакансию РНР-программиста.
Необходимо реализовать классы искателей с их именем, почтой и стажем работы.
Также реализовать возможность в любой момент встать на биржу вакансий (подписаться на уведомления),
либо же, напротив, выйти из гонки за местом. Таким образом, как только появится новая вакансия программиста,
все жаждущие автоматически получат уведомления на почту (можно реализовать условно).
*/

require 'vendor/autoload.php';

use Homework6\Observer\Analyst;
use Homework6\Observer\HandHunter;
use Homework6\Observer\Programmer;

$hh = new HandHunter();

$programmer = new Programmer('programmer@mail.ru');
$analyst = new Analyst('analyst@mail.ru');

$hh->attach($programmer);
$hh->attach($analyst);

$hh->addVacancy('woodcutter', 100);
$hh->addVacancy('programmer', 500);
$hh->addVacancy('analyst', 400);

$hh->detach($programmer);
$hh->addVacancy('programmer', 500);