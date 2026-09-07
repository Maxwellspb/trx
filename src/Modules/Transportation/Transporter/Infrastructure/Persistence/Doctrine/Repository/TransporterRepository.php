<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine\Repository;

use App\Modules\Transportation\Transporter\Domain\Entity\Transporter;
use App\Modules\Transportation\Transporter\Domain\Repository\TransporterRepositoryInterface;

class TransporterRepository implements TransporterRepositoryInterface
{

    public function findById(string $id): ?Transporter
    {
        // TODO: Implement findById() method.
    }

    public function getById(string $id): Transporter
    {
        // TODO: Implement getById() method.
    }

    public function exists(string $transporterId): bool
    {
        // TODO: Implement exists() method.
    }
}