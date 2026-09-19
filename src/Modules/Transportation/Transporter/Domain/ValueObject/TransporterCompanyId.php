<?php

namespace App\Modules\Transportation\Transporter\Domain\ValueObject;

use App\Common\Domain\Model\Uuid7;

final readonly class TransporterCompanyId
{
    private function __construct(
        private Uuid7 $uuid7
    ) {}

    public static function fromString(string $value): self
    {
        return new self(Uuid7::fromString($value));
    }

    public static function fromUuid(Uuid7 $uuid7): self
    {
        return new self($uuid7);
    }

    public function getValue(): string
    {
        return $this->uuid7->value;
    }
}
