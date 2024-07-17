<?php

namespace Poposki\KernelBundle\Application\EventDispatcher;

interface EventInterface
{
    /**
     * @return \DateTimeInterface
     */
    public function occurredOn(): \DateTimeInterface;
}
