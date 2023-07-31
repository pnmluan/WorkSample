<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Repository;

use Magento\Framework\Exception\AlreadyExistsException;
use Smartbox\Exception\Magento\CouldNotSaveContextException;
use Smartbox\Exception\Magento\NoSuchEntityContextException;
use Smartbox\WorkSample\Api\Entity\InventoryInterface;
use Smartbox\WorkSample\Api\Repository\InventoryRepositoryInterface;
use Smartbox\WorkSample\Model\Entity\Inventory;
use Smartbox\WorkSample\Model\Entity\InventoryFactory;
use Smartbox\WorkSample\Model\ResourceModel\Inventory as InventoryResource;
use Smartbox\WorkSample\Model\Rest\PhoneInventory\ErrorHandler;

class InventoryRepository implements InventoryRepositoryInterface
{
    public final const SAVE_INVENTORY_ERROR_MESSAGE = 'Could not save inventory';
    public final const UPDATE_INVENTORY_ERROR_MESSAGE = 'Could not update inventory';

    public function __construct(
        protected InventoryResource $inventoryResource,
        protected InventoryFactory  $inventoryFactory
    ) {
    }

    /**
     * @param InventoryInterface $inventory
     * @return int
     * @throws AlreadyExistsException
     * @throws CouldNotSaveContextException
     */
    public function save(InventoryInterface $inventory): int
    {
        try {
            /** @var Inventory $inventory */
            $this->inventoryResource->save($inventory);

            return intval($inventory->getId());
        } catch (AlreadyExistsException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            throw new CouldNotSaveContextException(
                __(self::SAVE_INVENTORY_ERROR_MESSAGE),
                [
                    'payload' => $inventory,
                    'exception_message' => $exception->getMessage()
                ]
            );
        }
    }

    /**
     * @param InventoryInterface $inventory
     * @return int
     * @throws AlreadyExistsException
     * @throws CouldNotSaveContextException
     */
    public function update(InventoryInterface $inventory): int
    {
        try {
            /** @var Inventory $inventory */
            $inventoryId = intval($inventory->getId());
            /** @var Inventory $currentInventory */
            $currentInventory = $this->get($inventoryId);
            $editedInventoryId = $this->checkUnique($inventory); // $editedInventoryId is queried from edited unique constraint

            // Case No unique constraint or The same value between  $editedInventoryId and $inventoryId => Can update Inventory
            if (empty($editedInventoryId) || $editedInventoryId == $currentInventory->getId()) {
                $this->inventoryResource->save($inventory);
                return intval($inventory->getId());
            }

            /**
             * Case existing an unique constraint row which $editedInventoryId was existed,
             * But $editedInventoryId is not the same with $inventoryId => Can not update Inventory
             */
            throw new AlreadyExistsException(__(self::UPDATE_INVENTORY_ERROR_MESSAGE));
        } catch (AlreadyExistsException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            throw new CouldNotSaveContextException(
                __(self::SAVE_INVENTORY_ERROR_MESSAGE),
                [
                    'payload' => $inventory,
                    'exception_message' => $exception->getMessage()
                ]
            );
        }
    }

    /**
     * @param int $inventoryId
     * @return InventoryInterface
     * @throws NoSuchEntityContextException
     */
    public function get(int $inventoryId): InventoryInterface
    {
        $inventory = $this->inventoryFactory->create();
        $this->inventoryResource->load($inventory, $inventoryId);

        if (!$inventory->getId()) {
            throw new NoSuchEntityContextException(
                __(ErrorHandler::INVENTORY_NOT_FOUND_ERROR_MESSAGE),
                [
                    'inventory_id' => $inventoryId
                ]
            );
        }

        return $inventory;
    }

    /**
     * Check if a Inventory with the given unique combination exists and return the inventory_id if found.
     * @param InventoryInterface $inventory
     * @return int
     */
    protected function checkUnique(InventoryInterface $inventory): int
    {
        return $this->inventoryResource->getInventoryIdByUniqueAttributes(
            $inventory->getPhoneId(),
            $inventory->getYear(),
            $inventory->getLikeNewPercentage()
        );
    }
}
