<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Entity;

use Magento\Framework\Model\AbstractModel;
use Smartbox\WorkSample\Api\Entity\InventoryInterface;
use Smartbox\WorkSample\Model\ResourceModel\Inventory as Resource;

class Inventory extends AbstractModel implements InventoryInterface
{
    protected function _construct()
    {
        $this->_init(Resource::class);
    }

    /**
     * @return int
     */
    public function getPhoneId(): int
    {
        return intval($this->getData(InventoryInterface::PHONE_ID));
    }

    /**
     * @param int $phoneId
     * @return InventoryInterface
     */
    public function setPhoneId(int $phoneId): InventoryInterface
    {
        return $this->setData(InventoryInterface::PHONE_ID, $phoneId);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return intval($this->getData(InventoryInterface::QUANTITY));
    }

    /**
     * @param int $quantity
     * @return InventoryInterface
     */
    public function setQuantity(int $quantity): InventoryInterface
    {
        return $this->setData(InventoryInterface::QUANTITY, $quantity);
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return intval($this->getData(InventoryInterface::YEAR));
    }

    /**
     * @param int $year
     * @return InventoryInterface
     */
    public function setYear(int $year): InventoryInterface
    {
        return $this->setData(InventoryInterface::YEAR, $year);
    }

    /**
     * @return int
     */
    public function getLikeNewPercentage(): int
    {
        return intval($this->getData(InventoryInterface::LIKENEW_PERCENTAGE));
    }

    /**
     * @param int $likeNewPercentage
     * @return InventoryInterface
     */
    public function setLikeNewPercentage(int $likeNewPercentage): InventoryInterface
    {
        return $this->setData(InventoryInterface::LIKENEW_PERCENTAGE, $likeNewPercentage);
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return floatval($this->getData(InventoryInterface::PRICE));
    }

    /**
     * @param float $price
     * @return InventoryInterface
     */
    public function setPrice(float $price): InventoryInterface
    {
        return $this->setData(InventoryInterface::PRICE, $price);
    }
}
