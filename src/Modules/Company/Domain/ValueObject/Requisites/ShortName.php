<?php

namespace App\Modules\Company\Domain\ValueObject\Requisites;

class ShortName
{
    public function __construct(
        private string $shortName,
    ) {}

    public function getValue(): string
    {
        return $this->shortName;
    }
}
