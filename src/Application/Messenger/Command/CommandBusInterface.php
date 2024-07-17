<?php

namespace Poposki\KernelBundle\Application\Messenger\Command;

use Symfony\Component\Messenger\Envelope;

interface CommandBusInterface
{
    /**
     * Dispatches a messenger command to the command bus
     *
     * @param CommandInterface $command
     * * @return Envelope
     * * @throws \Throwable
     */
    public function handle(CommandInterface $command): Envelope;
}
