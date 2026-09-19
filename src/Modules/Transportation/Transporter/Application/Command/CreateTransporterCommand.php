<?php

namespace App\Modules\Transportation\Transporter\Application\Command;

use App\Modules\Transportation\Transporter\Domain\Enum\TransporterStatus;

final readonly class CreateTransporterCommand
{
    public function __construct(
        public string $alias,
        public TransporterStatus $transporterStatus = TransporterStatus::PENDING,
        public array $companyIds = []
    ) {}
}
