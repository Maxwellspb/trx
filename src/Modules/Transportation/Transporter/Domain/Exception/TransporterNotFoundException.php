<?php

namespace App\Modules\Transportation\Transporter\Domain\Exception;

use Exception;

class TransporterNotFoundException extends Exception
{
    private const string MESSAGE = 'Transporter not found';
    private const int CODE = 404;


    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE, null);
    }
}
