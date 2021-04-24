<?php

require_once 'src/task.php';

$newTask = new Task(1, 3, 'new');


print('<pre>');

var_dump($newTask);

print('</pre>');
