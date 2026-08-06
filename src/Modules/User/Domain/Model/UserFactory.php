<?php

namespace App\Modules\User\Domain\Model;

use App\Common\Domain\Service\UuidGeneratorInterface;
use DateTimeImmutable;

class UserFactory
{
    public function __construct(
        private UuidGeneratorInterface $uuidGenerator,
    ) {}

    public function create(
        string $login,
        string $password,
        ?DateTimeImmutable $createdAt = null,
    ): User {
        $userId = new UserId($this->uuidGenerator->generate());


    }
}