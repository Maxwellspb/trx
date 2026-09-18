<?php

namespace App\Modules\Transportation\Transporter\Domain\ValueObject;

use App\Common\Domain\Model\Uuid7;

final readonly class TransporterId
{
    private function __construct(
        private Uuid7 $uuid7
    ) {}

    public static function fromUuid(Uuid7 $uuid7): self
    {
        return new self($uuid7);
    }

    public static function fromString(string $value): self
    {
        return new self(Uuid7::fromString($value));
    }

    public function getUuid7(): Uuid7
    {
        return $this->uuid7;
    }

    public function __toString(): string
    {
        return $this->uuid7->value;
    }
}
