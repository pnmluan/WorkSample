<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Rest\PhoneInventory;

use Exception;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Phrase;
use Magento\Framework\Webapi\Exception as MagentoException;
use Smartbox\ApiRestClient\ApiRestException;
use Smartbox\Exception\Core\InvalidArgumentContextException;
use Smartbox\Exception\Magento\LocalizedContextException;

class ErrorHandler
{
    public final const ALREADY_EXISTS_ERROR_MESSAGE = 'This Phone Inventory has already been existed';
    public final const DEFAULT_ERROR_MESSAGE = 'Cannot save this Phone Inventory. Please try again later.';
    public final const PHONE_NOT_FOUND_ERROR_MESSAGE = 'Could not update phone';

    /**
     * @param Exception $exception
     * @return Phrase
     */
    public function getErrorMessage(Exception $exception): Phrase
    {
        return match (get_class($exception)) {
            ApiRestException::class, LocalizedContextException::class => __(self::PHONE_NOT_FOUND_ERROR_MESSAGE),
            InvalidArgumentContextException::class => __($exception->getMessage()),
            AlreadyExistsException::class => __(self::ALREADY_EXISTS_ERROR_MESSAGE),
            default => __(self::DEFAULT_ERROR_MESSAGE),
        };
    }

    /**
     * @param Exception $exception
     * @return int
     */
    public function getErrorCode(Exception $exception): int
    {
        return match (get_class($exception)) {
            InvalidArgumentContextException::class,
            ApiRestException::class,
            AlreadyExistsException::class,
            LocalizedContextException::class => MagentoException::HTTP_NOT_FOUND,
            default => MagentoException::HTTP_INTERNAL_ERROR,
        };
    }
}
