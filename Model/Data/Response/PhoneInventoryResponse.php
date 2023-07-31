<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Data\Response;

use Magento\Framework\DataObject;
use Smartbox\WorkSample\Api\Data\Response\PhoneInventoryResponseInterface;

class PhoneInventoryResponse extends DataObject implements PhoneInventoryResponseInterface
{
    public function isSuccess(): bool
    {
        return \boolval($this->getData(PhoneInventoryResponseInterface::SUCCESS));
    }

    public function setSuccess(bool $success): PhoneInventoryResponseInterface
    {
        return $this->setData(PhoneInventoryResponseInterface::SUCCESS, $success);
    }
}
