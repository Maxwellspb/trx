<?php

namespace App\Modules\User\Domain\Model;

use App\Modules\User\Domain\Service\PasswordHasherInterface;
use DateTimeImmutable;
use InvalidArgumentException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    public function __construct(
        private UserId $id,
        private(set) string $login,
        private string $hashedPassword,
        private array $roles,
        private DatetimeImmutable $createdAt,
    ) {}

    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @param string $login
     */
    public function changeLogin(string $login): self
    {
        if (empty($login)) {
            throw new InvalidArgumentException('New login must not be empty');
        }

        $this->login = $login;
    }

    public function getPassword(): ?string
    {
        return $this->hashedPassword;
    }

    /**
     * @param string $newHashedPassword
     * @return self
     */
    public function changePassword(string $newHashedPassword): self
    {
        if (empty($newHashedPassword)) {
            throw new InvalidArgumentException('New password must not be empty');
        }

        $this->hashedPassword = $newHashedPassword;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getUserIdentifier(): string
    {
        return $this->login;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
