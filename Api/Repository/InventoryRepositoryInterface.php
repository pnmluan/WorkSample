<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Repository;

use Smartbox\Exception\Magento\CouldNotSaveContextException;
use Smartbox\WorkSample\Api\Entity\InventoryInterface;

interface InventoryRepositoryInterface
{
    /**
     * @param InventoryInterface $inventory
     *
     * @return void
     *
     * @throws CouldNotSaveContextException
     */
    public function save(InventoryInterface $inventory): void;
}
