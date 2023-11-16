<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use StudoDev\AdventCalendar\AdventCalendar;

$app = new AdventCalendar('../data/calendar.json');
$app->handle();
