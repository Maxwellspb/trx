<?php

namespace App\Modules\Transportation\Transporter\Application\Command;

use App\Modules\Transportation\Transporter\Domain\Entity\Transporter;
use App\Modules\Transportation\Transporter\Domain\Event\TransporterCreatedEvent;
use App\Modules\Transportation\Transporter\Domain\Factory\TransporterCompanyLinkFactory;
use App\Modules\Transportation\Transporter\Domain\Factory\TransporterFactory;
use App\Modules\Transportation\Transporter\Domain\Repository\TransporterRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DispatchAfterCurrentBusStamp;

#[AsMessageHandler]
class CreateTransporterHandler
{
    public function __construct(
        private TransporterFactory $transporterFactory,
        private TransporterCompanyLinkFactory $transporterCompanyLinkFactory,
        private TransporterRepositoryInterface $transporterRepository,
        private EntityManagerInterface $entityManager,
        //private MessageBusInterface $eventBus,
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

                $event = new TransporterCreatedEvent($transporter->getId());

                /*$this
                    ->eventBus
                    ->dispatch(new Envelope($event)->with(new DispatchAfterCurrentBusStamp()));*/
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
