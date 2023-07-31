<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Model\Repository;

use Magento\Framework\Exception\AlreadyExistsException;
use Smartbox\Exception\Magento\CouldNotSaveContextException;
use Smartbox\Exception\Magento\NoSuchEntityContextException;
use Smartbox\WorkSample\Api\Entity\PhoneInterface;
use Smartbox\WorkSample\Api\Repository\PhoneRepositoryInterface;
use Smartbox\WorkSample\Model\Entity\Phone;
use Smartbox\WorkSample\Model\Entity\PhoneFactory;
use Smartbox\WorkSample\Model\ResourceModel\Phone as PhoneResource;
use Smartbox\WorkSample\Model\Rest\PhoneInventory\ErrorHandler;

class PhoneRepository implements PhoneRepositoryInterface
{
    public final const SAVE_PHONE_ERROR_MESSAGE = 'Could not save phone';
    public final const UPDATE_PHONE_ERROR_MESSAGE = 'Could not update phone';

    public function __construct(
        protected PhoneResource $phoneResource,
        protected PhoneFactory  $phoneFactory
    ) {
    }

    /**
     * @param PhoneInterface $phone
     * @return int
     * @throws AlreadyExistsException
     * @throws CouldNotSaveContextException
     */
    public function save(PhoneInterface $phone): int
    {
        try {
            $phoneId = $this->checkUnique($phone);
            if (empty($phoneId)) {
                /** @var Phone $phone */
                $this->phoneResource->save($phone);
                return intval($phone->getId());
            }

            return $phoneId;
        } catch (AlreadyExistsException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            throw new CouldNotSaveContextException(
                __(self::SAVE_PHONE_ERROR_MESSAGE),
                [
                    'payload' => $phone,
                    'message' => $exception->getMessage()
                ]
            );
        }
    }

    /**
     * @param PhoneInterface $phone
     * @return int
     * @throws AlreadyExistsException
     * @throws CouldNotSaveContextException
     */
    public function update(PhoneInterface $phone): int
    {
        try {
            /** @var Phone $phone */
            $phoneId = intval($phone->getId());
            /** @var Phone $currentPhone */
            $currentPhone = $this->get($phoneId);
            $editedPhoneId = $this->checkUnique($phone); // $editedPhoneId is queried from edited unique constraint

            // Case No unique constraint or The same value between  $editedPhoneId and $phoneId => Can update phone
            if (empty($editedPhoneId) || $editedPhoneId == $currentPhone->getId()) {
                $this->phoneResource->save($phone);
                return intval($phone->getId());
            }

            /**
             * Case existing an unique constraint row which $editedPhoneId was existed,
             * But $editedPhoneId is not the same with $phoneId => Can not update phone
             */
            throw new AlreadyExistsException(__(self::UPDATE_PHONE_ERROR_MESSAGE));
        } catch (AlreadyExistsException $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            throw new CouldNotSaveContextException(
                __(self::UPDATE_PHONE_ERROR_MESSAGE),
                [
                    'payload' => $phone,
                    'exception_message' => $exception->getMessage()
                ]
            );
        }
    }

    /**
     * @param int $phoneId
     * @return PhoneInterface
     * @throws NoSuchEntityContextException
     */
    public function get(int $phoneId): PhoneInterface
    {
        $phone = $this->phoneFactory->create();
        $this->phoneResource->load($phone, $phoneId);

        if (!$phone->getId()) {
            throw new NoSuchEntityContextException(
                __(ErrorHandler::PHONE_NOT_FOUND_ERROR_MESSAGE),
                [
                    'phone_id' => $phoneId
                ]
            );
        }

        return $phone;
    }

    /**
     * Check if a phone with the given unique combination exists and return the phone_id if found.
     * @param PhoneInterface $phone
     * @return int
     */
    protected function checkUnique(PhoneInterface $phone): int
    {
        return $this->phoneResource->getPhoneIdByUniqueAttributes($phone->getBodycolorId(), $phone->getMemoryId());
    }
}
