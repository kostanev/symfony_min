<?php

namespace App\MessageHandler;

use App\Message\SomeTask;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SomeTaskHandler
{
    public function __invoke(SomeTask $task): void
    {
        echo "Retrieved task with content: " . $task->getContent() . PHP_EOL;
    }
}