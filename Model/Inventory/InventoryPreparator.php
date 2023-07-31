<?php
namespace Smartbox\WorkSample\Model\Inventory;

use Smartbox\WorkSample\Api\Data\Request\PhoneInventoryRequestInterface;
use Smartbox\WorkSample\Api\Entity\InventoryInterface;
use Smartbox\WorkSample\Model\Entity\InventoryFactory;

class InventoryPreparator
{
    public function __construct(
        protected InventoryFactory $inventoryFactory
    ) {
    }

    /**
     * Map data from PhoneInventoryRequestInterface to PhoneInterface.
     *
     * @param PhoneInventoryRequestInterface $request
     * @param int $phoneId
     * @param int|null $inventoryId
     * @return InventoryInterface
     */
    public function execute(PhoneInventoryRequestInterface $request, int $phoneId, int $inventoryId  = null): InventoryInterface
    {
        $inventory = $this->inventoryFactory->create();
        if (!empty($inventoryId)) {
            $inventory->setId($inventoryId);
        }

        return $inventory->setPhoneId($phoneId)
                    ->setQuantity($request->getQuantity())
                    ->setYear($request->getYear())
                    ->setLikeNewPercentage($request->getLikeNewPercentage())
                    ->setPrice($request->getPrice());
    }
}
