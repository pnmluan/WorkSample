<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Inventory;

use Smartbox\Exception\Core\InvalidArgumentContextException;
use Smartbox\WorkSample\Api\Entity\InventoryInterface;

class InventoryValidator
{
    public function validate(InventoryInterface $inventory): void
    {
        if (0 >= $inventory->getPrice()) {
            throw new InvalidArgumentContextException('Invalid price value');
        }

        if (0 > $inventory->getQuantity()) {
            throw new InvalidArgumentContextException('Invalid quantiry value');
        }

        if (0 >  $inventory->getLikeNewPercentage() || 100 < $inventory->getLikeNewPercentage()) {
            throw new InvalidArgumentContextException('Invalid likenew_percentage value');
        }
    }
}
