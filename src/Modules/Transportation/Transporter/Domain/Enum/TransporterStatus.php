<?php

namespace App\Modules\Transportation\Transporter\Domain\Enum;

enum TransporterStatus: string
{
    case PENDING = 'PENDING';
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case ORPHANED = 'ORPHANED';
}
