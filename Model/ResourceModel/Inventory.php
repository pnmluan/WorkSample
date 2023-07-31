<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\ResourceModel;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Smartbox\WorkSample\Api\Entity\InventoryInterface as Entity;

class Inventory extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(Entity::MAIN_TABLE, Entity::ENTITY_ID);
    }

    /**
     * @param int $phoneId
     * @param int $year
     * @param int $likenewPercentage
     * @return int
     */
    public function getInventoryIdByUniqueAttributes(int $phoneId, int $year, int $likenewPercentage): int
    {
        /** @var AdapterInterface $connection */
        $connection = $this->getConnection();
        $select = $connection->select()
            ->from($this->getTable(Entity::MAIN_TABLE), [Entity::ENTITY_ID])
            ->where(Entity::PHONE_ID . '=?', $phoneId)
            ->where(Entity::YEAR . '=?', $year)
            ->where(Entity::LIKENEW_PERCENTAGE . '=?', $likenewPercentage);

        return intval($connection->fetchOne($select));
    }
}
