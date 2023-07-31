<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Rest;

use Exception;
use Psr\Log\LoggerInterface;
use Smartbox\Exception\Core\InvalidArgumentContextException;
use Smartbox\Exception\Magento\WebApiContextException;
use Smartbox\WorkSample\Api\Data\Request\PhoneInventoryRequestInterface;
use Smartbox\WorkSample\Api\Data\Response\PhoneInventoryResponseInterface;
use Smartbox\WorkSample\Api\Repository\InventoryRepositoryInterface;
use Smartbox\WorkSample\Api\Repository\PhoneRepositoryInterface;
use Smartbox\WorkSample\Api\Rest\PhoneInventoryManagementInterface;
use Smartbox\WorkSample\Model\Inventory\InventoryPreparator;
use Smartbox\WorkSample\Model\Inventory\InventoryValidator;
use Smartbox\WorkSample\Model\Phone\PhonePreparator;
use Smartbox\WorkSample\Model\Rest\PhoneInventory\ErrorHandler;

class PhoneInventoryManagement implements PhoneInventoryManagementInterface
{
    public final const REGISTER_PHONE_ERROR_MESSAGE = 'Register Phone Error';
    public final const REGISTER_PHONE_SUCCESS_MESSAGE = 'Register Phone Success';
    public final const UPDATE_PHONE_SUCCESS_MESSAGE = 'Update Phone Success';
    public final const UPDATE_PHONE_ERROR_MESSAGE = 'Update Phone Error';

    public function __construct(
        protected PhoneInventoryResponseInterface   $response,
        protected PhoneRepositoryInterface          $phoneRepository,
        protected PhonePreparator                   $phonePreparator,
        protected InventoryRepositoryInterface      $inventoryRepository,
        protected InventoryPreparator               $inventoryPreparator,
        protected InventoryValidator                $inventoryValidator,
        protected ErrorHandler                      $errorHandler,
        protected LoggerInterface                   $logger
    ) {
    }

    /**
     * @param PhoneInventoryRequestInterface $request
     * @return PhoneInventoryResponseInterface
     * @throws WebApiContextException
     */
    public function register(PhoneInventoryRequestInterface $request): PhoneInventoryResponseInterface
    {
        try {
            $this->validateRequest($request);

            $phoneId = $this->phoneRepository->save($this->phonePreparator->execute($request));

            if ($phoneId) {
                $inventory = $this->inventoryPreparator->execute($request, $phoneId);
                $this->inventoryValidator->validate($inventory);
                $this->inventoryRepository->save($inventory);
            }

            $this->logger->info(
                self::REGISTER_PHONE_SUCCESS_MESSAGE,
                [
                    'payload' => $request
                ]
            );

            return $this->response->setSuccess(true);
        } catch (Exception $exception) {
            $this->logger->error(
                self::REGISTER_PHONE_ERROR_MESSAGE,
                [
                    'message' => $exception->getMessage(),
                    'exception_code' => $exception->getCode(),
                    'payload' => $request
                ]
            );
            throw new WebApiContextException(
                $this->errorHandler->getErrorMessage($exception),
                0,
                $this->errorHandler->getErrorCode($exception),
                [],
                'name',
                null,
                $exception->getTraceAsString()
            );
        }
    }

    /**
     * @param PhoneInventoryRequestInterface $request
     * @return PhoneInventoryResponseInterface
     * @throws WebApiContextException
     */
    public function update(int $phoneId, int $inventoryId, PhoneInventoryRequestInterface $request): PhoneInventoryResponseInterface
    {
        try {
            $this->validateRequest($request);

            $phoneId = $this->phoneRepository->update($this->phonePreparator->execute($request, $phoneId));

            if ($phoneId) {
                $inventory = $this->inventoryPreparator->execute($request, $phoneId);
                $this->inventoryValidator->validate($inventory);
                $this->inventoryRepository->save($inventory);
            }

            $this->logger->info(
                self::UPDATE_PHONE_SUCCESS_MESSAGE,
                [
                    'payload' => $request
                ]
            );

            return $this->response->setSuccess(true);
        } catch (Exception $exception) {
            $this->logger->error(
                self::UPDATE_PHONE_ERROR_MESSAGE,
                [
                    'message' => $exception->getMessage(),
                    'exception_code' => $exception->getCode(),
                    'payload' => $request
                ]
            );
            throw new WebApiContextException(
                $this->errorHandler->getErrorMessage($exception),
                0,
                $this->errorHandler->getErrorCode($exception),
                [],
                'name',
                null,
                $exception->getTraceAsString()
            );
        }
    }

    /**
     * @param PhoneInventoryRequestInterface $request
     */
    private function validateRequest(PhoneInventoryRequestInterface $request): void
    {
        if (empty($request->getBodycolorId())) {
            throw new InvalidArgumentContextException('Missing bodycolorId in payloads');
        }

        if (empty($request->getOsversionId())) {
            throw new InvalidArgumentContextException('Missing osversionId in payloads');
        }

        if (empty($request->getMemoryId())) {
            throw new InvalidArgumentContextException('Missing memoryId in payloads');
        }

        if (empty($request->getQuantity())) {
            throw new InvalidArgumentContextException('Missing quantity in payloads');
        }

        if (empty($request->getYear())) {
            throw new InvalidArgumentContextException('Missing year in payloads');
        }

        if (empty($request->getLikenewPercentage())) {
            throw new InvalidArgumentContextException('Missing likenewPercentage in payloads');
        }

        if (empty($request->getPrice())) {
            throw new InvalidArgumentContextException('Missing price in payloads');
        }
    }
}
