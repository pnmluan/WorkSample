<?php

declare(strict_types=1);

namespace Smartbox\WorkSample\Api\Entity;

interface PhoneInterface
{
    public final const MAIN_TABLE = 'ws_phone';
    public final const ENTITY_ID = 'id';
    public final const BODYCOLOR_ID = 'bodycolor_id';
    public final const OSVERSION_ID = 'osversion_id';
    public final const MEMORY_ID = 'memory_id';

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
}
