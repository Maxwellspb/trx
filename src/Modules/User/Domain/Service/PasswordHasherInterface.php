<?php

namespace App\Modules\User\Domain\Service;

use App\Modules\User\Domain\Model\User;

interface PasswordHasherInterface
{
    public function hash(User $param, string $plainPassword);
}