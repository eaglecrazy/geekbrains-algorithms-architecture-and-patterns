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
    public string  $text = '';
    public ?int    $selectedStart = null;
    public ?int    $selectedEnd   = null;
    public ?string $clipboard = null;
    private array  $stack         = [];

    public function __construct(string $text = '')
    {
        $this->text = $text;
    }

    public function show()
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

    public function setCursorPosition($position){
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

    public function copySelected(): void {
        $this->clipboard = $this->getSelected();

        if($this->clipboard){
            echo '- текст скопирован: "' . $this->clipboard . '"'. PHP_EOL;
        } else {
            echo '- попытка скопировать текст не выделен.' . PHP_EOL;
        }
    }

    public function cutSelected(): void {
        $this->clipboard = $this->getSelected();
        $this->deleteSelected();

        if($this->clipboard){
            echo '- текст вырезан: "' . $this->clipboard . '"'. PHP_EOL;
        } else {
            echo '- попытка вырезать, текст не выделен.' . PHP_EOL;
        }
    }

    public function deleteSelected(){
        if ((!$this->selectedStart && $this->selectedStart != 0) || !$this->selectedEnd || $this->selectedStart === $this->selectedEnd) {
            return;
        }

        //без проверок индекса
        $this->text = substr_replace($this->text, '', $this->selectedStart, $this->selectedEnd - $this->selectedStart);
        $this->setCursorPosition($this->selectedStart);
    }

    public function paste(){
        $this->deleteSelected();
        $this->text = substr_replace($this->text, $this->clipboard, $this->selectedStart, 0);
        echo '- текст вставлен: "' . $this->clipboard . '"'. PHP_EOL;

    }

    public function push(string $command, string $text, int $index)
    {
    }

    public function pop(string $command, string $text, int $index)
    {
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


$editor = new Editor('One of our favorite candies here in Denmark is Ga-Jol...');

$copyButton  = new Copy();
$cutButton   = new Cut();
$pasteButton = new Paste();

$copyCommand  = new CommandCopy($editor);
$cutCommand   = new CommandCut($editor);
$pasteCommand = new CommandPaste($editor);

$copyButton->setCommand($copyCommand);
$cutButton->setCommand($cutCommand);
$pasteButton->setCommand($pasteCommand);

echo $separator;
$editor->show();

echo $separator;
$editor->setSelection(0,10);
$copyButton->click();
$editor->show();

echo $separator;
$cutButton->click();
$editor->show();

echo $separator;
$pasteButton->click();
$editor->show();

echo $separator;
