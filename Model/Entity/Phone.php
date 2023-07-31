<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Entity;

use Magento\Framework\Model\AbstractModel;
use Smartbox\WorkSample\Api\Entity\PhoneInterface;
use Smartbox\WorkSample\Model\ResourceModel\Phone as Resource;

class Phone extends AbstractModel implements PhoneInterface
{
    /**
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init(Resource::class);
    }

    /**
     * @return int
     */
    public function getBodycolorId(): int
    {
        return intval($this->getData(PhoneInterface::BODYCOLOR_ID));
    }

    /**
     * @param int $bodyColorId
     * @return PhoneInterface
     */
    public function setBodycolorId(int $bodyColorId): PhoneInterface
    {
        return $this->setData(PhoneInterface::BODYCOLOR_ID, $bodyColorId);
    }

    /**
     * @return int
     */
    public function getOsversionId(): int
    {
        return intval($this->getData(PhoneInterface::OSVERSION_ID));
    }

    /**
     * @param int $osVersionId
     * @return PhoneInterface
     */
    public function setOsversionId(int $osVersionId): PhoneInterface
    {
        return $this->setData(PhoneInterface::OSVERSION_ID, $osVersionId);
    }

    /**
     * @return int
     */
    public function getMemoryId(): int
    {
        return intval($this->getData(PhoneInterface::MEMORY_ID));
    }

    /**
     * @param int $memoryId
     * @return PhoneInterface
     */
    public function setMemoryId(int $memoryId): PhoneInterface
    {
        return $this->setData(PhoneInterface::MEMORY_ID, $memoryId);
    }
}
