<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ScheduleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function home(): Response
    {
        $form = $this->createForm(ScheduleType::class);

        return $this->render('pages/home.html.twig', [
            'form' => $form->createView()
        ]);
    }
}