<?php

namespace App\Modules\Transportation\Transporter\Domain\Entity;

use App\Modules\Transportation\Transporter\Domain\Enum\TransporterStatus;
use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterId;
use App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine\Repository\TransporterRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransporterRepository::class)]
class Transporter
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(name: 'id', type: 'transporter_id', unique: true)]
        private TransporterId $id,

        #[ORM\Column(name: 'name', length: 255, unique: true)]
        private string $alias,

        #[ORM\Column(name: 'transporter_status', type: 'string', enumType: TransporterStatus::class)]
        private TransporterStatus $transporterStatus,

        #[ORM\Column(name: 'company_id', type: 'company_id', nullable: true)]
        private string $companyId,

        #[ORM\Column(name: 'created_at', type: 'datetime')]
        private DateTime $createdAt,

        #[ORM\Column(name: 'updated_at', type: 'datetime')]
        private DateTime $updatedAt,
    ) {}

    public function getId(): TransporterId
    {
        return $this->id;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function canDeclareTransportations(): bool
    {
        return $this->transporterStatus === TransporterStatus::ACTIVE;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new DateTime("now");
    }
}
