<?php

namespace App\Modules\Company\Domain\ValueObject\Requisites;

class Inn
{
    public function __construct(
        private string $inn,
    ) {}

    public function getValue(): string
    {
        return $this->inn;
    }
}
