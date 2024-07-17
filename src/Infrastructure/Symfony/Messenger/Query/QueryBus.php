<?php

namespace Poposki\KernelBundle\Infrastructure\Symfony\Messenger\Query;

use Poposki\KernelBundle\Application\Messenger\Query\QueryBusInterface;
use Poposki\KernelBundle\Application\Messenger\Query\QueryInterface;
use Poposki\KernelBundle\Infrastructure\Symfony\Messenger\AbstractMessageBus;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class QueryBus extends AbstractMessageBus implements QueryBusInterface
{
    use HandleTrait;

    public function __construct(
        MessageBusInterface $messageBus
    ) {
        $this->messageBus = $messageBus;
    }

    /**
     * {@inheritDoc}
     */
    public function ask(QueryInterface $query): mixed
    {
        try {
            return $this->handle($query);
        } catch (HandlerFailedException $exception) {
            $this->throwException($exception);
        }
    }
}
