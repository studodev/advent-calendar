<?php

namespace StudoDev\AdventCalendar\Controller;

use DateTime;
use DateTimeImmutable;
use StudoDev\AdventCalendar\Util\JsonUtil;

class CalendarController
{
    public function index(array $items): void
    {
        require_once '../templates/calendar/index.php';
    }

    public function open(string $calendarDataPath, array $items): void
    {
        $encoded = file_get_contents("php://input");
        $body = json_decode($encoded, true);

        $entries = [];
        foreach ($items as $item) {
            if ($body['name'] === $item->getName()) {
                $today = new DateTimeImmutable();
                $dateString = sprintf('%s-%s-%s', $today->format('Y'), '12', $body['day']);
                $drawDate = new DateTimeImmutable($dateString);
                $item->setDrawDate($drawDate);
            }

            $entries[] = $item->toArray();
        }

        JsonUtil::saveFile($calendarDataPath, [
            'items' => $entries,
        ]);
    }
}
