<?php

namespace App\Modules\Transportation\Transporter\Domain\Repository;

use App\Modules\Transportation\Transporter\Domain\Entity\Transporter;
use App\Modules\Transportation\Transporter\Domain\Exception\TransporterNotFoundException;

interface TransporterRepositoryInterface
{
    public function findById(string $id): ?Transporter;

    /**
     * @param string $id
     * @return Transporter
     * @throws TransporterNotFoundException
     */
    public function getById(string $id): Transporter;

    public function exists(string $transporterId): bool;
}
