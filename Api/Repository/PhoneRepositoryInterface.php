<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Repository;

use Smartbox\WorkSample\Api\Entity\PhoneInterface;

interface PhoneRepositoryInterface
{
    /**
     * @param PhoneInterface $phone
     *
     *
     * @return int
     */
    public function save(PhoneInterface $phone): int;

    /**
     * @param int $phoneId
     * @return PhoneInterface
     */
    public function get(int $phoneId): PhoneInterface;

    /**
     * @param PhoneInterface $phone
     * @return int
     */
    public function update(PhoneInterface $phone): int;
}
