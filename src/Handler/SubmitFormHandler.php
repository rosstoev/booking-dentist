<?php

declare(strict_types=1);

namespace App\Handler;

use App\Entity\Schedule;
use App\Repository\ScheduleRepository;

class SubmitFormHandler
{
    public function __construct(
        private readonly ScheduleRepository $scheduleRepo
    ) {
    }

    /**
     * @throws \Exception
     */
    public function handleSchedule(Schedule $schedule): void
    {
        $date = new \DateTime($schedule->getStartFrom()->format('Y-m-d H:i:s'));
        $date->modify('+ 1 hour');
        $endDate = new \DateTimeImmutable($date->format('Y-m-d H:i:s'));
        $schedule->setEndOn($endDate);
        $this->scheduleRepo->save($schedule);
    }
}