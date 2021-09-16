<?php
/*
Команда: вы — разработчик продукта Macrosoft World. Это текстовый редактор с возможностями копирования,
вырезания и вставки текста (пока только это). Необходимо реализовать механизм по логированию этих операций и
возможностью отмены и возврата действий. Т. е., в ходе работы программы вы открываете текстовый файл .txt,
выделяете участок кода (два значения: начало и конец) и выбираете, что с этим кодом делать.
*/

$separator = '***********************************' . PHP_EOL;

class Editor
{
    public string  $text          = '';
    public ?int    $selectedStart = null;
    public ?int    $selectedEnd   = null;
    public ?string $clipboard     = null;
    private array  $backup        = [];
    private int    $counter = 0;
    private int    $maxCounter = 0;

    public function __construct(string $text = '')
    {
        $this->text = $text;
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
        $this->maxCounter = $this->counter;
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

abstract class Command
{
    protected Editor $editor;

    public function __construct(Editor $editor)
    {
        $this->editor = $editor;
    }

    abstract public function execute();
}

class CommandCopy extends Command
{

    public function execute()
    {
        echo '- команда "Copy"' . PHP_EOL;
        $this->editor->copySelected();
    }
}

class CommandCut extends Command
{

    public function execute()
    {
        echo '- команда "Cut"' . PHP_EOL;
        $this->editor->cutSelected();
    }
}

class CommandPaste extends Command
{
    public function execute()
    {
        echo '- команда "Paste"' . PHP_EOL;
        $this->editor->paste();
    }
}

class CommandUndo extends Command
{
    public function execute()
    {
        echo '- команда "Undo"' . PHP_EOL;
        $this->editor->undo();
    }
}

class CommandRedo extends Command
{
    public function execute()
    {
        echo '- команда "Redo"' . PHP_EOL;
        $this->editor->redo();
    }
}

abstract class Button
{
    protected array $commands = [];

    public function setCommand(Command $command)
    {
        $this->commands[] = $command;
    }

    public function click()
    {
        foreach ($this->commands as $command) {
            $command->execute();
        }
    }
}

class Copy extends Button
{
    public function click()
    {
        echo '- кнопка "Copy"' . PHP_EOL;
        parent::click();
    }
}

class Cut extends Button
{
    public function click()
    {
        echo '- кнопка "Cut"' . PHP_EOL;
        parent::click();
    }
}

class Paste extends Button
{
    public function click()
    {
        echo '- кнопка "Paste"' . PHP_EOL;
        parent::click();
    }
}

class Undo extends Button
{
    public function click()
    {
        echo '- кнопка "Undo"' . PHP_EOL;
        parent::click();
    }
}

class Redo extends Button
{
    public function click()
    {
        echo '- кнопка "Redo"' . PHP_EOL;
        parent::click();
    }
}

$editor = new Editor('One of our favorite candies here in Denmark is Ga-Jol...');

$copyButton  = new Copy();
$cutButton   = new Cut();
$pasteButton = new Paste();
$undoButton  = new Undo();
$redoButton  = new Redo();

$copyCommand  = new CommandCopy($editor);
$cutCommand   = new CommandCut($editor);
$pasteCommand = new CommandPaste($editor);
$undoCommand  = new CommandUndo($editor);
$redoCommand  = new CommandRedo($editor);

$copyButton->setCommand($copyCommand);
$cutButton->setCommand($cutCommand);
$pasteButton->setCommand($pasteCommand);
$undoButton->setCommand($undoCommand);
$redoButton->setCommand($redoCommand);

echo $separator;
$editor->show();

echo $separator;
$editor->setSelection(0, 11);
$copyButton->click();
$editor->show();

echo $separator;
$editor->setCursorPosition(0);
$pasteButton->click();
$editor->show();

echo $separator;
$undoButton->click();//ok
$editor->show();

echo $separator;
$undoButton->click();//nothing
$editor->show();

echo $separator;
$redoButton->click();//ok
$editor->show();

echo $separator;
$redoButton->click();//nothing
$editor->show();

echo $separator;
$editor->setSelection(0, 11);
$cutButton->click();
$editor->show();

echo $separator;
$undoButton->click();//nothing
$editor->show();

echo $separator;
$redoButton->click();//ok
$editor->show();