<?php

namespace App\Modules\Company\Infrastructure\Delivery\Api\v1\Request;

use OpenApi\Attributes as OA;
use Symfony\Component\Validator\Constraints as Assert;

#[OA\Schema(
    schema: 'CreateTransporterRequestDto',
    description: 'Данные для создания компании',
    required: ['orgName', 'shortName', 'orgAddress', 'inn', 'kpp', 'ogrn'],
)]
final readonly class CreateCompanyRequestDto
{
    public function __construct(
        #[OA\Property(
            description: 'Полное название компании',
            type: 'string',
            example: 'Общество с ограниченной ответственностью СтройАвтоТранс'
        )]
        #[Assert\NotBlank]
        public string $orgName,

        #[OA\Property(
            description: 'Сокращенное название компании',
            type: 'string',
            example: 'СтройАвтоТранс'
        )]
        #[Assert\NotBlank]
        public string $shortName,

        #[OA\Property(
            description: 'Юридический адрес компании',
            type: 'string',
            example: 'РФ, СПб, Невский пр. 1'
        )]
        #[Assert\NotBlank]
        public string $orgAddress,

        #[OA\Property(
            description: 'ИНН компании',
            type: 'string',
            example: '6311573037'
        )]
        #[Assert\NotBlank]
        public string $inn,

        #[OA\Property(
            description: 'КПП компании',
            type: 'string',
            example: '620943127'
        )]
        #[Assert\NotBlank]
        public string $kpp,

        #[OA\Property(
            description: 'ОГРН компании',
            type: 'string',
            example: '6014667274770'
        )]
        #[Assert\NotBlank]
        public string $ogrn,
    ){}
}
