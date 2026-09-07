<?php

namespace App\Modules\Company\Domain\Entity;

use App\Modules\Company\Domain\ValueObject\Requisites\Inn;
use App\Modules\Company\Domain\ValueObject\Requisites\Kpp;
use App\Modules\Company\Domain\ValueObject\Requisites\Ogrn;
use App\Modules\Company\Domain\ValueObject\Requisites\OrgAddress;
use App\Modules\Company\Domain\ValueObject\Requisites\OrgName;
use App\Modules\Company\Domain\ValueObject\Requisites\ShortName;

class Company
{
    public function __construct(
        private OrgName $orgName,
        private ShortName $shortName,
        private OrgAddress $orgAddress,
        private Inn $inn,
        private Kpp $kpp,
        private Ogrn $ogrn,
    ) {}

    public function getOrgName(): OrgName
    {
        return $this->orgName;
    }

    public function getShortName(): ShortName
    {
        return $this->shortName;
    }

    public function getOrgAddress(): OrgAddress
    {
        return $this->orgAddress;
    }

    public function getInn(): Inn
    {
        return $this->inn;
    }

    public function getKpp(): Kpp
    {
        return $this->kpp;
    }

    public function getOgrn(): Ogrn
    {
        return $this->ogrn;
    }
}
