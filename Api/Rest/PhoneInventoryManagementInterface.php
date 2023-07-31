<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Rest;

use Smartbox\WorkSample\Api\Data\Request\PhoneInventoryRequestInterface;
use Smartbox\WorkSample\Api\Data\Response\PhoneInventoryResponseInterface;

interface PhoneInventoryManagementInterface
{
    /**
     * @param PhoneInventoryRequestInterface $request
     * @return PhoneInventoryResponseInterface
     */
    public function register(PhoneInventoryRequestInterface $request): PhoneInventoryResponseInterface;

    /**
     * @param int $phoneId
     * @param int $inventoryId
     * @param PhoneInventoryRequestInterface $request
     * @return PhoneInventoryResponseInterface
     */
    public function update(int $phoneId, int $inventoryId, PhoneInventoryRequestInterface $request): PhoneInventoryResponseInterface;
}
