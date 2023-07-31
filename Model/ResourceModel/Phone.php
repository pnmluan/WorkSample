<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\ResourceModel;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Smartbox\WorkSample\Api\Entity\PhoneInterface as Entity;

class Phone extends AbstractDb
{
    /**
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init(Entity::MAIN_TABLE, Entity::ENTITY_ID);
    }

    /**
     * @param int $bodycolorId
     * @param int $memoryId
     * @return int
     */
    public function getPhoneIdByUniqueAttributes(int $bodycolorId, int $memoryId): int
    {
        /** @var AdapterInterface $connection */
        $connection = $this->getConnection();
        $select = $connection->select()
            ->from($this->getTable(Entity::MAIN_TABLE), [Entity::ENTITY_ID])
            ->where(Entity::BODYCOLOR_ID . '=?', $bodycolorId)
            ->where(Entity::MEMORY_ID . '=?', $memoryId);

        return intval($connection->fetchOne($select));
    }
}
