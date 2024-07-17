<?php

namespace Poposki\KernelBundle\Application\Messenger\Query;

interface QueryBusInterface
{
    /**
     * Dispatches a messenger query to the query bus
     *
     * @param QueryInterface $query
     * @return mixed
     * @throws \Throwable
     */
    public function ask(QueryInterface $query): mixed;
}
