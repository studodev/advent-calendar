<?php

namespace StudoDev\AdventCalendar;

use StudoDev\AdventCalendar\Controller\CalendarController;
use StudoDev\AdventCalendar\Factory\CalendarItemFactory;
use StudoDev\AdventCalendar\Util\JsonUtil;

class AdventCalendar
{
    private array $items;

    public function __construct(private readonly string $calendarDataPath)
    {
        $json = JsonUtil::parseFile($this->calendarDataPath);
        $this->items = CalendarItemFactory::createMany($json['items']);
    }

    public function handle(): void
    {
        $uri = $_SERVER['REQUEST_URI'];

        $calendarController = new CalendarController();
        if ($uri === '/') {
            $calendarController->index($this->items);
        } else if ($uri === '/open') {
            $calendarController->open($this->calendarDataPath, $this->items);
        }
    }
}
