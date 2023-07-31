<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Data\Request;

use Magento\Framework\DataObject;
use Smartbox\WorkSample\Api\Data\Request\PhoneInventoryRequestInterface;

class PhoneInventoryRequest extends DataObject implements PhoneInventoryRequestInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBodycolorId(): int
    {
        return intval($this->getData(PhoneInventoryRequestInterface::BODYCOLOR_ID));
    }

    /**
     * {@inheritdoc}
     */
    public function setBodycolorId(int $bodyColorId): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::BODYCOLOR_ID, $bodyColorId);
    }

    /**
     * {@inheritdoc}
     */
    public function getOsversionId(): int
    {
        return intval($this->getData(PhoneInventoryRequestInterface::OSVERSION_ID));
    }

    /**
     * {@inheritdoc}
     */
    public function setOsversionId(int $osVersionId): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::OSVERSION_ID, $osVersionId);
    }

    /**
     * {@inheritdoc}
     */
    public function getMemoryId(): int
    {
        return intval($this->getData(PhoneInventoryRequestInterface::MEMORY_ID));
    }

    /**
     * {@inheritdoc}
     */
    public function setMemoryId(int $memoryId): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::MEMORY_ID, $memoryId);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuantity(): int
    {
        return intval($this->getData(PhoneInventoryRequestInterface::QUANTITY));
    }

    /**
     * {@inheritdoc}
     */
    public function setQuantity(int $quantity): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::QUANTITY, $quantity);
    }

    /**
     * {@inheritdoc}
     */
    public function getYear(): int
    {
        return intval($this->getData(PhoneInventoryRequestInterface::YEAR));
    }

    /**
     * {@inheritdoc}
     */
    public function setYear(int $year): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::YEAR, $year);
    }

    /**
     * {@inheritdoc}
     */
    public function getLikeNewPercentage(): int
    {
        return intval($this->getData(PhoneInventoryRequestInterface::LIKENEW_PERCENTAGE));
    }

    /**
     * {@inheritdoc}
     */
    public function setLikeNewPercentage(int $likeNewPercentage): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::LIKENEW_PERCENTAGE, $likeNewPercentage);
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice(): float
    {
        return floatval($this->getData(PhoneInventoryRequestInterface::PRICE));
    }

    /**
     * {@inheritdoc}
     */
    public function setPrice(float $price): PhoneInventoryRequestInterface
    {
        return $this->setData(PhoneInventoryRequestInterface::PRICE, $price);
    }
}
