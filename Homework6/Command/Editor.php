<?php

namespace Homework6\Command;

class Editor
{
    public string  $text          = '';
    public ?int    $selectedStart = null;
    public ?int    $selectedEnd   = null;
    public ?string $clipboard     = null;
    private array  $backup        = [];
    private int    $counter       = 0;
    private int    $maxCounter    = 0;

    public function __construct(string $text = '')
    {
        $this->text     = $text;
        $this->backup[] = $text;
    }

    public function show(): void
    {
        echo '"' . $this->text . '"' . PHP_EOL;
    }

    public function setSelection(int $start, int $end)
    {
        //без проверок
        $this->selectedStart = $start;
        $this->selectedEnd   = $end;
        echo '- выделен текст: "' . $this->getSelected() . '"' . PHP_EOL;
    }

    public function setCursorPosition($position)
    {
        $this->selectedStart = $position;
        $this->selectedEnd   = $position;
        echo '- курсор установлен в позицию: ' . $position . PHP_EOL;
    }

    public function getSelected(): ?string
    {
        if ((!$this->selectedStart && $this->selectedStart != 0) || !$this->selectedEnd || $this->selectedStart === $this->selectedEnd) {
            return null;
        }

        //без проверок индекса
        return substr($this->text, $this->selectedStart, $this->selectedEnd - $this->selectedStart);
    }

    public function copySelected(): void
    {
        $this->clipboard = $this->getSelected();

        if ($this->clipboard) {
            echo '- текст скопирован: "' . $this->clipboard . '"' . PHP_EOL;
        } else {
            echo '- попытка скопировать текст не выделен.' . PHP_EOL;
        }
    }

    public function cutSelected(): void
    {
        $this->clipboard = $this->getSelected();
        $this->deleteSelected();
        $this->backup();

        if ($this->clipboard) {
            echo '- текст вырезан: "' . $this->clipboard . '"' . PHP_EOL;
        } else {
            echo '- попытка вырезать, текст не выделен.' . PHP_EOL;
        }
    }

    public function deleteSelected(): void
    {
        if ((!$this->selectedStart && $this->selectedStart != 0) || !$this->selectedEnd || $this->selectedStart === $this->selectedEnd) {
            return;
        }

        //без проверок индекса
        $this->text = substr_replace($this->text, '', $this->selectedStart, $this->selectedEnd - $this->selectedStart);
        $this->setCursorPosition($this->selectedStart);
    }

    public function paste(): void
    {
        $this->deleteSelected();
        $this->text = substr_replace($this->text, $this->clipboard, $this->selectedStart, 0);
        $this->backup();
        echo '- текст вставлен: "' . $this->clipboard . '"' . PHP_EOL;
    }

    private function backup(): void
    {
        $this->counter++;
        $this->maxCounter             = $this->counter;
        $this->backup[$this->counter] = $this->text;
    }

    public function undo()
    {
        if ($this->counter > 0) {
            $this->counter--;
            $this->text = $this->backup[$this->counter];
            echo '- отмена' . PHP_EOL;
        } else {
            echo '- ничего не происходит' . PHP_EOL;
        }
    }

    public function redo()
    {
        if ($this->counter < $this->maxCounter) {
            $this->counter++;
            $this->text = $this->backup[$this->counter];
            echo '- возврат ввода' . PHP_EOL;
        } else {
            echo '- ничего не происходит' . PHP_EOL;
        }
    }
}
