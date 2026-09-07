<?php

namespace App\Modules\Company\Domain\ValueObject\Requisites;

class Ogrn
{
    public function __construct(
        private string $ogrn,
    ) {}

    public function getValue(): string
    {
        return $this->ogrn;
    }
}
