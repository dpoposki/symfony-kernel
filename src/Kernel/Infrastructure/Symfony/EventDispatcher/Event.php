<?php

namespace Poposki\Kernel\Infrastructure\Symfony\EventDispatcher;

use Poposki\Kernel\Application\EventDispatcher\EventInterface;

class Event extends \Symfony\Contracts\EventDispatcher\Event implements EventInterface
{
    /**
     * {@inheritDoc}
     */
    public function occurredOn(): \DateTimeInterface
    {
        return new \DateTimeImmutable();
    }
}
