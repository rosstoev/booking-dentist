<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ScheduleType;
use App\Handler\SubmitFormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ScheduleController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route('/save-schedule', name: 'app_save_schedule', methods: ['POST'])]
    public function save(Request $request, SubmitFormHandler $submitFormHandler): JsonResponse
    {
        $form = $this->createForm(ScheduleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $submitFormHandler->handleSchedule($form->getData());
            $this->addFlash('success', 'Вие успешно си запазихте час.');
        }

        $view = $this->renderView('components/form/_schedule_form.html.twig', ['form' => $form]);
        return new JsonResponse(['output' => $view, 'isValid' => $form->isValid()]);
    }
}