<?php

namespace App\Modules\Transportation\Transporter\Application\Command;

use App\Modules\Transportation\Transporter\Domain\Entity\Transporter;
use App\Modules\Transportation\Transporter\Domain\Factory\TransporterCompanyLinkFactory;
use App\Modules\Transportation\Transporter\Domain\Factory\TransporterFactory;
use App\Modules\Transportation\Transporter\Domain\Repository\TransporterRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateTransporterHandler
{
    public function __construct(
        private TransporterFactory $transporterFactory,
        private TransporterCompanyLinkFactory $transporterCompanyLinkFactory,
        private TransporterRepositoryInterface $transporterRepository,
        private EntityManagerInterface $entityManager,
    ) {}

    public function __invoke(CreateTransporterCommand $command): void
    {
        $transporter = $this
            ->transporterFactory
            ->create($command->alias);

        $this->linkCompaniesIfExist($transporter, $command);

        $this
            ->entityManager
            ->wrapInTransaction(function () use ($transporter) {
                $this
                    ->transporterRepository
                    ->save($transporter);
            });
    }

    private function linkCompaniesIfExist(
        Transporter $transporter,
        CreateTransporterCommand $command,
    ): void {
        if (empty($command->companyIds)) {
            return;
        }

        foreach ($command->companyIds as $companyId) {
            $transporter->linkCompany(
                $this
                    ->transporterCompanyLinkFactory
                    ->create($transporter, $companyId),
            );
        }
    }
}
