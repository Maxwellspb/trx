<?php

namespace App\Modules\Transportation\Transporter\Domain\Event;

use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterId;

final readonly class TransporterCreatedEvent
{
    public function __construct(
        public readonly TransporterId $transporterId,
    ) {}
}