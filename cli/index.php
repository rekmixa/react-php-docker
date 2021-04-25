<?php

require __DIR__ . '/../vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

$process = new \React\ChildProcess\Process('echo foo');
$process->start($loop);

$process->stdout->on('data', function ($chunk) {
    echo $chunk;
});

$process->on('exit', function($exitCode, $termSignal) {
    echo 'Process exited with code ' . $exitCode . PHP_EOL;
});

$loop->run();
