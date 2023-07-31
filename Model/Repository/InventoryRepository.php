<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Repository;

use Magento\Framework\Exception\AlreadyExistsException;
use Smartbox\Exception\Magento\CouldNotSaveContextException;
use Smartbox\WorkSample\Api\Entity\InventoryInterface;
use Smartbox\WorkSample\Api\Repository\InventoryRepositoryInterface;
use Smartbox\WorkSample\Model\Entity\Inventory;
use Smartbox\WorkSample\Model\ResourceModel\Inventory as InventoryResource;

class InventoryRepository implements InventoryRepositoryInterface
{
    public final const SAVE_PHONE_ERROR_MESSAGE = 'Could not save inventory';

    public function __construct(
        protected InventoryResource $inventoryResource
    ) {
    }

    /**
     * @param InventoryInterface $inventory
     * @throws AlreadyExistsException
     * @throws CouldNotSaveContextException
     */
    public function save(InventoryInterface $inventory): void
    {
        try {
            /** @var Inventory $inventory */
            $this->inventoryResource->save($inventory);
        } catch (AlreadyExistsException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            throw new CouldNotSaveContextException(
                __(self::SAVE_PHONE_ERROR_MESSAGE),
                [
                    'payload' => $inventory,
                    'exception_message' => $exception->getMessage()
                ]
            );
        }
    }
}
