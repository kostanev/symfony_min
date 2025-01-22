<?php

namespace App\Service;

use App\Message\SomeTask;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class TaskService
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @throws ExceptionInterface
     */
    public function process(string $content): void
    {
        $this->bus->dispatch(new SomeTask($content));
    }
}
