<?php

namespace App\Modules\Company\Domain\ValueObject\Requisites;

class OrgName
{
    public function __construct(
        private string $orgName,
    ) {}

    public function getValue(): string
    {
        return $this->orgName;
    }
}
