<?php

namespace Homework6\Observer;

use SplObjectStorage;
use SplObserver;
use SplSubject;

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
            /** @var Person $observer */
            echo $observer->getEmail() . ' was attached' . PHP_EOL;
            $this->observers->attach($observer);
        }
    }

    public function detach(SplObserver $observer)
    {
        if ($this->observers->contains($observer)) {
            echo $observer->getEmail() . ' was detached' . PHP_EOL;
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
