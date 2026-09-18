<?php

namespace App\Modules\Transportation\Transporter\Domain\Entity;

use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterCompanyLinkId;
use App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine\Repository\TransporterCompanyIdRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransporterCompanyIdRepository::class)]
class TransporterCompanyLink
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(name: 'id', type: 'transporter_company_link_id', unique: true)]
        private TransporterCompanyLinkId $id,

        #[ORM\ManyToOne(targetEntity: Transporter::class, inversedBy: 'transporterCompanyLinks')]
        private Transporter $transporter,

        #[ORM\Column(type: 'transporter_company_id')]
        private TransporterCompanyId $transporterCompanyId,

        #[ORM\Column(name: 'created_at', type: 'datetime')]
        private DateTime $createdAt,

        #[ORM\Column(name: 'updated_at', type: 'datetime')]
        private DateTime $updatedAt,
    ) {}

    public function getId(): TransporterCompanyLinkId
    {
        return $this->id;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function onPreUpdate(): void
    {
        $this->updatedAt = new DateTime("now");
    }
}