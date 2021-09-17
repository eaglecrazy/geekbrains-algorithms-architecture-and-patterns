<?php
/*
Команда: вы — разработчик продукта Macrosoft World. Это текстовый редактор с возможностями копирования,
вырезания и вставки текста (пока только это). Необходимо реализовать механизм по логированию этих операций и
возможностью отмены и возврата действий. Т. е., в ходе работы программы вы открываете текстовый файл .txt,
выделяете участок кода (два значения: начало и конец) и выбираете, что с этим кодом делать.
*/

//Командами реализовал только копирование, вырезание, вставку, undo и redo.
//Остальной функционал сделал через editor.

require 'vendor/autoload.php';

use Homework6\Command\Button\Copy as ButtonCopy;
use Homework6\Command\Button\Cut as ButtonCut;
use Homework6\Command\Button\Paste as ButtonPaste;
use Homework6\Command\Button\Redo as ButtonRedo;
use Homework6\Command\Button\Undo as ButtonUndo;
use Homework6\Command\Command\Copy as CommandCopy;
use Homework6\Command\Command\Cut as CommandCut;
use Homework6\Command\Command\Paste as CommandPaste;
use Homework6\Command\Command\Redo as CommandRedo;
use Homework6\Command\Command\Undo as CommandUndo;
use Homework6\Command\Editor;

$separator = '***********************************' . PHP_EOL;

$editor = new Editor('One of our favorite candies here in Denmark is Ga-Jol...');

$copyButton  = new ButtonCopy();
$cutButton   = new ButtonCut();
$pasteButton = new ButtonPaste();
$undoButton  = new ButtonUndo();
$redoButton  = new ButtonRedo();

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