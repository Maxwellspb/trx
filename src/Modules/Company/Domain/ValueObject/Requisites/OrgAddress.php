<?php

namespace App\Modules\Company\Domain\ValueObject\Requisites;

class OrgAddress
{
    public function __construct(
        private string $orgAddress,
    ) {}

    public function getValue(): string
    {
        return $this->orgAddress;
    }
}
