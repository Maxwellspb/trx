<?php

namespace App\Modules\Transportation\Transporter\Domain\ValueObject;

use Symfony\Component\Uid\Uuid;

class TransporterId
{
    private function __construct(private Uuid $value) {}

    public static function generate(): self
    {
        return new self(Uuid::v7());
    }

    public static function fromString(string $value): self
    {
        return new self(Uuid::fromString($value));
    }

    public function getValue(): Uuid
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value->toRfc4122();
    }
}
