<?php

namespace Poposki\KernelBundle\Domain\Entity;

interface EntityInterface
{
    /**
     * @return int|null
     */
    public function getId(): ?int;
}
