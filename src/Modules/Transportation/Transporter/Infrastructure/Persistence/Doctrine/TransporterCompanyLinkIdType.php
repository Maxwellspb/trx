<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TransporterCompanyLinkIdType extends Type
{
    public const string NAME = 'transporter_company_link_id';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): TransporterCompanyId
    {
        return TransporterCompanyId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        if ($value instanceof TransporterCompanyId) {
            return $value->getUuid7()->value;
        }

        return TransporterCompanyId::fromString($value)->__toString();
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