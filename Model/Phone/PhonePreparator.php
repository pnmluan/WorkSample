<?php
namespace Smartbox\WorkSample\Model\Phone;

use Smartbox\WorkSample\Api\Data\Request\PhoneInventoryRequestInterface;
use Smartbox\WorkSample\Api\Entity\PhoneInterface;
use Smartbox\WorkSample\Model\Entity\PhoneFactory;

class PhonePreparator
{
    public function __construct(
        protected PhoneFactory $phoneFactory
    ) {
    }

    /**
     * Map data from PhoneInventoryRequestInterface to PhoneInterface.
     *
     * @param PhoneInventoryRequestInterface $request
     * @param int|null $phoneId
     * @return PhoneInterface
     */
    public function execute(PhoneInventoryRequestInterface $request, int $phoneId = null): PhoneInterface
    {
        $phone = $this->phoneFactory->create();
        if (!empty($phoneId)) {
            $phone->setId($phoneId);
        }

        return $phone->setBodycolorId($request->getBodycolorId())
                    ->setOsversionId($request->getOsversionId())
                    ->setMemoryId($request->getMemoryId());
    }
}
