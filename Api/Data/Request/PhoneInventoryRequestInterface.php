<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Data\Request;

interface PhoneInventoryRequestInterface
{
    public final const BODYCOLOR_ID = 'bodycolor_id';
    public final const OSVERSION_ID = 'osversion_id';
    public final const MEMORY_ID = 'memory_id';
    public final const QUANTITY = 'quantity';
    public final const YEAR = 'year';
    public final const LIKENEW_PERCENTAGE = 'likenew_percentage';
    public final const PRICE = 'price';

    /**
     * @return int
     */
    public function getBodycolorId(): int;

    /**
     * @param int $bodyColorId
     * @return $this
     */
    public function setBodycolorId(int $bodyColorId): self;

    /**
     * @return int
     */
    public function getOsversionId(): int;

    /**
     * @param int $osVersionId
     * @return $this
     */
    public function setOsversionId(int $osVersionId): self;

    /**
     * @return int
     */
    public function getMemoryId(): int;

    /**
     * @param int $memoryId
     * @return $this
     */
    public function setMemoryId(int $memoryId): self;

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
    public function getLikenewPercentage(): int;

    /**
     * @param int $likeNewPercentage
     * @return $this
     */
    public function setLikenewPercentage(int $likeNewPercentage): self;

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
