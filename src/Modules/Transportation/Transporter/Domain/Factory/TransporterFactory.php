<?php

namespace App\Modules\Transportation\Transporter\Domain\Factory;

use App\Common\Domain\Service\UuidGeneratorInterface;
use App\Modules\Transportation\Transporter\Domain\Entity\Transporter;
use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterId;
use DateTime;

readonly class TransporterFactory
{
    public function __construct(
        private UuidGeneratorInterface $uuidGenerator,
    ) {}

    public function create(
        string $alias,
    ): Transporter {
        $id = $this->uuidGenerator->generate();
        $transporterId = TransporterId::fromUuid($id);

        return new Transporter(
            id: $transporterId,
            alias: $alias,
            createdAt: new DateTime('now'),
            updatedAt: new DateTime('now'),
        );
    }
}