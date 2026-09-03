<?php

namespace App\Modules\Transportation\Transporter\Presentation\Http\v1\Request;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class CreateTransporterRequestDto
{
    public function __construct(
        #[Assert\NotBlank]
        public string $orgName,

        #[Assert\NotBlank]
        public string $shortName,

        #[Assert\NotBlank]
        public string $orgAddress,

        #[Assert\NotBlank]
        public string $inn,

        #[Assert\NotBlank]
        public string $kpp,

        #[Assert\NotBlank]
        public string $ogrn,
    ){}
}
