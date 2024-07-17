<?php

namespace Poposki\KernelBundle\Infrastructure\Symfony\Messenger\Command;

use Poposki\KernelBundle\Application\Messenger\Command\CommandBusInterface;
use Poposki\KernelBundle\Application\Messenger\Command\CommandInterface;
use Poposki\KernelBundle\Infrastructure\Symfony\Messenger\AbstractMessageBus;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBus extends AbstractMessageBus implements CommandBusInterface
{
    public function __construct(
        private readonly MessageBusInterface $messageBus
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function handle(CommandInterface $command): Envelope
    {
        try {
            return $this->messageBus->dispatch($command);
        } catch (HandlerFailedException $exception) {
            $this->throwException($exception);
        }
    }
}
