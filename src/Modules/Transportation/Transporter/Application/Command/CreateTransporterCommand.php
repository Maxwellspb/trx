<?php

namespace App\Modules\Transportation\Transporter\Application\Command;

final readonly class CreateTransporterCommand
{
    public function __construct(
        public string $alias,
        public array $companyIds = []
    ) {}
}
