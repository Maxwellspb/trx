<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine;

use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class TransporterIdType extends Type
{
    public const string NAME = 'transporter_id';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): TransporterId
    {
        return TransporterId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value instanceof TransporterId) {
            return $value->getValue();
        }

        return TransporterId::fromString($value)->getValue();
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
