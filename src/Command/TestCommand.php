<?php

namespace App\Command;

use App\Message\SomeTask;
use App\Service\TaskService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:test',
    description: 'Test command'
)]
class TestCommand extends Command
{
    private TaskService $taskService;

    public function __construct(TaskService $taskService, ?string $name = null)
    {
        $this->taskService = $taskService;

        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Dispatching new task');

        try {
            $this->taskService->process('Look! I created a message from a command!');
        }
        catch (ExceptionInterface $ex) {
            $output->writeln("An error occurred:" . $ex->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}