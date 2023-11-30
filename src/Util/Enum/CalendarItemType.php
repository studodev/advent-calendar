<?php

namespace StudoDev\AdventCalendar\Util\Enum;

enum CalendarItemType: string
{
    case VideoGame = 'video_game';
    case Movie = 'movie';
    case Podcast = 'podcast';
    case BoardGame = 'board_game';
    case Book = 'book';
    case Other = 'other';
}
