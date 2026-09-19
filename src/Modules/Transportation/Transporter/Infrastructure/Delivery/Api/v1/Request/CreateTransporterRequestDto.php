<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Delivery\Api\v1\Request;

use App\Modules\Transportation\Transporter\Domain\Enum\TransporterStatus;
use OpenApi\Attributes as OA;
use Symfony\Component\Validator\Constraints as Assert;

#[OA\Schema(
    schema: 'CreateTransporterRequestDto',
    description: 'Данные для создания компании',
    required: ['alias'],
)]
final readonly class CreateTransporterRequestDto
{
    public function __construct(
        #[OA\Property(
            description: 'Рабочее наименование перевозчика',
            type: 'string',
            example: 'СтройАвтоТранс'
        )]
        #[Assert\NotBlank]
        public string $alias,

        #[OA\Property(
            description: 'Статус перевозчика из списка',
            type: 'string',
            example: 'PENDING, ACTIVE, INACTIVE, ORPHANED'
        )]
        #[Assert\Choice(callback: [TransporterStatus::class, 'values'])]
        public string $transporterStatus = TransporterStatus::PENDING->value,

        #[OA\Property(
            description: 'Список UUID компаний (опционально). Может быть пустым.',
            type: 'array',
            items: new OA\Items(
                type: 'string',
                format: 'uuid',
                example: '550e8400-e29b-41d4-a716-446655440000',
            ),
            example: ['550e8400-e29b-41d4-a716-446655440000'],
        )]
        #[Assert\All([
            new Assert\Type(type: 'string', message: 'ID компании должен быть строкой UUID.'),
            new Assert\Uuid(message: 'Некорректный UUID компании.'),
        ])]
        public array $companyIds = [],
    ) {}
}
