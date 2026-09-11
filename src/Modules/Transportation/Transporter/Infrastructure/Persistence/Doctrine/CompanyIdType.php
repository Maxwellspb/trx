<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine;

use App\Modules\Transportation\Transporter\Domain\ValueObject\CompanyId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class CompanyIdType extends Type
{
    public const string NAME = 'company_id';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): CompanyId
    {
        return CompanyId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        if ($value instanceof CompanyId) {
            return $value->getUuid7()->value;
        }

        return CompanyId::fromString($value)->__toString();
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