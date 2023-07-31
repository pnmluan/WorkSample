<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Smartbox\WorkSample\Api\Entity\InventoryInterface as Entity;

class Inventory extends AbstractDb
{
    /**
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init(Entity::MAIN_TABLE, Entity::ENTITY_ID);
    }
}
