<?php

namespace CotolecialoDomain\Service;

use CotolecialoDomain\Record\SyncRecord;

interface SyncServiceStrategyInterface
{
    /**
     * @return SyncRecord
     */
    public function sync();
}
