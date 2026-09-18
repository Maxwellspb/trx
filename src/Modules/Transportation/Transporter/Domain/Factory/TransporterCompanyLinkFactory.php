<?php

namespace App\Modules\Transportation\Transporter\Domain\Factory;

use App\Common\Domain\Service\UuidGeneratorInterface;
use App\Modules\Transportation\Transporter\Domain\Entity\Transporter;
use App\Modules\Transportation\Transporter\Domain\Entity\TransporterCompanyLink;
use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterCompanyId;
use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterCompanyLinkId;

class TransporterCompanyLinkFactory
{
    public function __construct(
        private UuidGeneratorInterface $uuidGenerator,
    ) {}

    public function create(Transporter $transporter, string $companyId): TransporterCompanyLink
    {
        $transporterCompanyLinkId = TransporterCompanyLinkId::fromUuid($this->uuidGenerator->generate());
        $transporterCompanyId = TransporterCompanyId::fromString($companyId);

        return new TransporterCompanyLink(
            $transporterCompanyLinkId,
            $transporter,
            $transporterCompanyId,
        );
    }
}