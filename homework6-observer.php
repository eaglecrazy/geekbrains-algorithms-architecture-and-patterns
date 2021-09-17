<?php
/*
Наблюдатель: есть сайт HandHunter.gb. На нем работники могут подыскать себе вакансию РНР-программиста.
Необходимо реализовать классы искателей с их именем, почтой и стажем работы.
Также реализовать возможность в любой момент встать на биржу вакансий (подписаться на уведомления),
либо же, напротив, выйти из гонки за местом. Таким образом, как только появится новая вакансия программиста,
все жаждущие автоматически получат уведомления на почту (можно реализовать условно).
*/

interface Jobless
{
    public function getProfession(): string;
    public function getEmail(): string;
}

class Vacancy
{
    private string $position;

    private int    $salary;

    public function __construct(string $position, int $salary)
    {
        $this->position = $position;
        $this->salary   = $salary;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

}

class HandHunter implements SplSubject
{
    private array            $vacancies   = [];

    private ?Vacancy         $lastVacancy = null;

    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        if (!$this->observers->contains($observer)) {
            $this->observers->attach($observer);
        }
    }

    public function detach(SplObserver $observer)
    {
        if ($this->observers->contains($observer)) {
            $this->observers->detach($observer);
        }
    }

    public function notify()
    {
        $position = $this->lastVacancy->getPosition();

        /** @var SplObserver|Jobless $observer */
        foreach ($this->observers as $observer) {
            if ($observer->getProfession() === $position) {
                echo 'Send notification to: ' . $observer->getEmail() . PHP_EOL;
                $observer->update($this);
            }
        }
    }

    public function addVacancy(string $position, int $salary)
    {
        echo 'Add vacancy: ' . $position . PHP_EOL;
        $vacancy           = new Vacancy($position, $salary);
        $this->lastVacancy = $vacancy;
        $this->vacancies[] = $vacancy;
        $this->notify();
    }

    public function getLastVacancy(): ?Vacancy
    {
        return $this->lastVacancy;
    }
}

abstract class Person implements SplObserver, Jobless
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getProfession(): string
    {
        return strtolower(static::class);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function update(SplSubject $subject)
    {
        echo 'Notification received : ' . $this->getProfession() . PHP_EOL;
    }
}

class Programmer extends Person
{

}

class Analyst extends Person
{
}


$hh = new HandHunter();
$hh->addVacancy('woodcutter', 100);

$programmer = new Programmer('programmer@mail.ru');
$hh->attach($programmer);