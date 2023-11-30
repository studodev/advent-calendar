<?php

namespace StudoDev\AdventCalendar\Util;

class JsonUtil
{
    public static function parseFile(string $filename): array
    {
        $raw = file_get_contents($filename);
        return json_decode($raw, true);
    }

    public static function saveFile(string $filename, array $data): void
    {
        file_put_contents($filename, json_encode($data));
    }
}
