<?php

namespace StudoDev\AdventCalendar\Model;

use DateTimeImmutable;
use StudoDev\AdventCalendar\Util\Enum\CalendarItemType;

class CalendarItem
{
    private CalendarItemType $type;
    private string $name;
    private ?string $link = null;
    private bool $ratherWeekend = false;
    private ?DateTimeImmutable $drawDate = null;
    private bool $done = false;

    public function getType(): CalendarItemType
    {
        return $this->type;
    }

    public function setType(CalendarItemType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function isRatherWeekend(): bool
    {
        return $this->ratherWeekend;
    }

    public function setRatherWeekend(bool $ratherWeekend): self
    {
        $this->ratherWeekend = $ratherWeekend;

        return $this;
    }

    public function getDrawDate(): ?DateTimeImmutable
    {
        return $this->drawDate;
    }

    public function setDrawDate(?DateTimeImmutable $drawDate): self
    {
        $this->drawDate = $drawDate;

        return $this;
    }

    public function isDone(): bool
    {
        return $this->done;
    }

    public function setDone(bool $done): self
    {
        $this->done = $done;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->getType()->value,
            'name' => $this->getName(),
            'link' => $this->getLink(),
            'ratherWeekend' => $this->isRatherWeekend(),
            'drawDate' => $this->getDrawDate()?->format('Y-m-d'),
            'done' => $this->isDone(),
        ];
    }
}
