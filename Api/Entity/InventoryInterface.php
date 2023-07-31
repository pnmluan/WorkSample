<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Entity;

interface InventoryInterface
{
    public final const MAIN_TABLE = 'ws_inventory';
    public final const ENTITY_ID = 'id';
    public final const PHONE_ID = 'phone_id';
    public final const QUANTITY = 'quantity';
    public final const YEAR = 'year';
    public final const LIKENEW_PERCENTAGE = 'likenew_percentage';
    public final const PRICE = 'price';

    /**
     * @return int
     */
    public function getPhoneId(): int;

    /**
     * @param int $phoneId
     * @return $this
     */
    public function setPhoneId(int $phoneId): self;

    /**
     * @return int
     */
    public function getQuantity(): int;

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity): self;

    /**
     * @return int
     */
    public function getYear(): int;

    /**
     * @param int $year
     * @return $this
     */
    public function setYear(int $year): self;

    /**
     * @return int
     */
    public function getLikeNewPercentage(): int;

    /**
     * @param int $likeNewPercentage
     * @return $this
     */
    public function setLikeNewPercentage(int $likeNewPercentage): self;

    /**
     * @return float
     */
    public function getPrice(): float;

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): self;
}
