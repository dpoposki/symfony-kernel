<?php

namespace Poposki\KernelBundle\Infrastructure\Symfony\Http\Web\Controller;

use Poposki\KernelBundle\Application\Messenger\Command\CommandBusInterface;
use Poposki\KernelBundle\Application\Messenger\Command\CommandInterface;
use Poposki\KernelBundle\Application\Messenger\Query\QueryBusInterface;
use Poposki\KernelBundle\Application\Messenger\Query\QueryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\Messenger\Envelope;

class AbstractController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedServices(): array
    {
        return array_merge(parent::getSubscribedServices(), [
            'messenger.bus.command' => CommandBusInterface::class,
            'messenger.bus.query' => QueryBusInterface::class,
        ]);
    }

    /**
     * Dispatches a messenger command to the command bus
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(CommandInterface $command): Envelope
    {
        return $this->container->get('messenger.bus.command')->handle($command);
    }

    /**
     * Dispatches a messenger query to the query bus
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function ask(QueryInterface $query): mixed
    {
        return $this->container->get('messenger.bus.query')->ask($query);
    }
}
