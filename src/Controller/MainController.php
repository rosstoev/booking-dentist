<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use App\Serializer\ScheduleSerializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function home(ScheduleRepository $scheduleRepo, ScheduleSerializer $serializer): Response
    {
        $form = $this->createForm(ScheduleType::class);
        $schedules = $scheduleRepo->findAll();

        $events = $serializer->serializeAsJson($schedules);

        return $this->render('pages/home.html.twig', [
            'form' => $form->createView(),
            'events' => $events
        ]);
    }
}