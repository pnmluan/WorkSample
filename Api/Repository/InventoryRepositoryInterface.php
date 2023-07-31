<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Repository;

use Smartbox\WorkSample\Api\Entity\InventoryInterface;

interface InventoryRepositoryInterface
{
    /**
     * @param InventoryInterface $inventory
     *
     * @return int
     *
     */
    public function save(InventoryInterface $inventory): int;

    /**
     * @param int $inventoryId
     * @return InventoryInterface
     */
    public function get(int $inventoryId): InventoryInterface;

    /**
     * @param InventoryInterface $inventory
     *
     * @return int
     *
     */
    public function update(InventoryInterface $inventory): int;
}
