<?php

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
class SomeTask
{
    public function __construct(private string $content)
    {
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
