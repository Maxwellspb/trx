<?php

namespace App\Modules\User\Domain\Model;

use App\Common\Domain\Model\Uuid7;

class UserId
{
    public function __construct(
        private Uuid7 $uuid,
    ) {}

    public function value(): string
    {
        return $this->uuid->value;
    }
}