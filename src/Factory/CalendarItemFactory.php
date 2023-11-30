<?php

namespace StudoDev\AdventCalendar\Factory;

use DateTimeImmutable;
use StudoDev\AdventCalendar\Model\CalendarItem;
use StudoDev\AdventCalendar\Util\Enum\CalendarItemType;

class CalendarItemFactory
{
    public static function createMany(array $entries): array
    {
        $affectedItems = [];
        $unaffectedItems = [];
        $days = range(1, 24);

        shuffle($entries);
        foreach ($entries as $entry) {
            $item = self::create($entry);

            if ($drawDate = $item->getDrawDate()) {
                $dayKey = $drawDate->format('j');

                $affectedItems[$dayKey] = $item;
                $days = array_filter($days, function($i) use ($dayKey) {
                    return $i != $dayKey;
                });
            } else {
                $unaffectedItems[] = $item;
            }
        }

        foreach ($unaffectedItems as $item) {
            $dayKey = array_pop($days);
            $affectedItems[$dayKey] = $item;
        }

        uksort($affectedItems, function() {
            return rand() - rand();
        });

        return $affectedItems;
    }

    public static function create(array $entry): CalendarItem
    {
        $item = new CalendarItem();

        $type = CalendarItemType::from($entry['type']);
        $item->setType($type);

        $item->setName($entry['name']);

        if (array_key_exists('link', $entry)) {
            $item->setLink($entry['link']);
        }

        if (array_key_exists('ratherWeekend', $entry)) {
            $item->setRatherWeekend($entry['ratherWeekend']);
        }

        if (array_key_exists('drawDate', $entry) && $entry['drawDate']) {
            $drawDate = new DateTimeImmutable($entry['drawDate']);
            $item->setDrawDate($drawDate);
        }

        if (array_key_exists('done', $entry)) {
            $item->setDone($entry['done']);
        }

        return $item;
    }
}
