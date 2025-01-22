<?php

namespace App\Controller;

use App\Service\TaskService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_index')]
    public function index(TaskService $taskService): Response {
        try {
            $taskService->process('Look! I created a message from a web request!');
        }
        catch (ExceptionInterface $ex) {
            return new Response("An error occurred:" . $ex->getMessage());
        }

        return new Response('Task sent for processing!');
    }
}
