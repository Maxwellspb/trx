<?php

namespace App\Modules\Transportation\Transporter\Presentation\Http\v1\Response;

use Symfony\Component\Serializer\Attribute\Groups;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'TransporterResponseDto',
    description: 'Данные перевозчика',
    required: ['id', 'shortName']
)]
final readonly class TransporterResponseDto
{
    public function __construct(
        #[OA\Property(
            description: 'ID перевозчика',
            type: 'string',
            format: 'uuid',
            example: '550e8400-e29b-41d4-a716-446655440000'
        )]
        #[Groups(['transporter:full_read', 'transporter:list'])]
        public string $id,

        #[OA\Property(
            description: 'Полное название перевозчика',
            type: 'string',
            example: 'Общество с ограниченной ответственностью СтройАвтоТранс'
        )]
        #[Groups(['transporter:full_read'])]
        public string $orgName,

        #[OA\Property(
            description: 'Сокращенное название перевозчика',
            type: 'string',
            example: 'СтройАвтоТранс'
        )]
        #[Groups(['transporter:full_read', 'transporter:list'])]
        public string $shortName,

        #[OA\Property(
            description: 'Юридический адрес перевозчика',
            type: 'string',
            example: 'РФ, СПб, Невский пр. 1'
        )]
        #[Groups(['transporter:full_read'])]
        public string $orgAddress,

        #[OA\Property(
            description: 'ИНН перевозчика',
            type: 'string',
            example: '6311573037'
        )]
        #[Groups(['transporter:full_read'])]
        public string $inn,

        #[OA\Property(
            description: 'КПП перевозчика',
            type: 'string',
            example: '620943127'
        )]
        #[Groups(['transporter:full_read'])]
        public string $kpp,

        #[OA\Property(
            description: 'ОГРН перевозчика',
            type: 'string',
            example: '6014667274770'
        )]
        #[Groups(['transporter:full_read'])]
        public string $ogrn,
    ){}
}
