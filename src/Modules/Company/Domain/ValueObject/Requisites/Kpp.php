<?php

namespace App\Modules\Company\Domain\ValueObject\Requisites;

class Kpp
{
    public function __construct(
        private string $kpp,
    ) {}

    public function getValue(): string
    {
        return $this->kpp;
    }
}
