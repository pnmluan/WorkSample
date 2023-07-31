<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Data\Response;

interface PhoneInventoryResponseInterface
{
    final public const SUCCESS = 'success';

    /**
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess(bool $success): self;
}
