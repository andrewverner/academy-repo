<?php

use Taskforce\Domain\Task;

require_once 'vendor/autoload.php';

$newTask = new Task(1, 3, 'new');


print('<pre>');

var_dump($newTask);

print('</pre>');
