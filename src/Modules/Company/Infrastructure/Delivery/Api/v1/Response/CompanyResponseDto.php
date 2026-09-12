<?php

namespace App\Modules\Company\Infrastructure\Delivery\Api\v1\Response;

use OpenApi\Attributes as OA;
use Symfony\Component\Serializer\Attribute\Groups;

#[OA\Schema(
    schema: 'CompanyResponseDto',
    description: 'Данные компании',
    required: ['id', 'shortName']
)]
final readonly class CompanyResponseDto
{
    public function __construct(
        #[OA\Property(
            description: 'ID компании',
            type: 'string',
            format: 'uuid',
            example: '550e8400-e29b-41d4-a716-446655440000'
        )]
        #[Groups(['transporter:full_read', 'transporter:list'])]
        public string $id,

        #[OA\Property(
            description: 'Полное название компании',
            type: 'string',
            example: 'Общество с ограниченной ответственностью СтройАвтоТранс'
        )]
        #[Groups(['transporter:full_read'])]
        public string $orgName,

        #[OA\Property(
            description: 'Сокращенное название компании',
            type: 'string',
            example: 'СтройАвтоТранс'
        )]
        #[Groups(['transporter:full_read', 'transporter:list'])]
        public string $shortName,

        #[OA\Property(
            description: 'Юридический адрес компании',
            type: 'string',
            example: 'РФ, СПб, Невский пр. 1'
        )]
        #[Groups(['transporter:full_read'])]
        public string $orgAddress,

        #[OA\Property(
            description: 'ИНН компании',
            type: 'string',
            example: '6311573037'
        )]
        #[Groups(['transporter:full_read'])]
        public string $inn,

        #[OA\Property(
            description: 'КПП компании',
            type: 'string',
            example: '620943127'
        )]
        #[Groups(['transporter:full_read'])]
        public string $kpp,

        #[OA\Property(
            description: 'ОГРН компании',
            type: 'string',
            example: '6014667274770'
        )]
        #[Groups(['transporter:full_read'])]
        public string $ogrn,
    ){}
}
