<?php

namespace App\Common\Domain\Service;

use App\Common\Domain\Model\Uuid7;

interface UuidGeneratorInterface
{
    public function generate(): Uuid7;
}