<?php

namespace App\Common\Infrastructure\Uuid;

use App\Common\Domain\Model\Uuid7;
use App\Common\Domain\Service\UuidGeneratorInterface;
use Symfony\Component\Uid\Uuid;

class UuidGenerator implements UuidGeneratorInterface
{
    public function generate(): Uuid7
    {
        return new Uuid7(Uuid::v7()->toRfc4122());
    }
}
