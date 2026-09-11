<?php

namespace App\Common\Domain\Model;

readonly class Uuid7
{
    public function __construct(
        public string $value
    ) {

    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }
}
