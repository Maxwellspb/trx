<?php

namespace App\Modules\Transportation\Transporter\Infrastructure\Persistence\Doctrine;

use App\Modules\Transportation\Transporter\Domain\ValueObject\TransporterCompanyLinkId;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class TransporterCompanyLinkIdType extends Type
{
    public const string NAME = 'transporter_company_link_id';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): TransporterCompanyLinkId
    {
        return TransporterCompanyLinkId::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        if ($value instanceof TransporterCompanyLinkId) {
            return $value->getValue();
        }

        return TransporterCompanyLinkId::fromString($value)->getValue();
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