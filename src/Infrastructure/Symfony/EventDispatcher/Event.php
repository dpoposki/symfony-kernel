<?php

namespace Poposki\KernelBundle\Infrastructure\Symfony\EventDispatcher;

use Poposki\KernelBundle\Application\EventDispatcher\EventInterface;

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
