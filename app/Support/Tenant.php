<?php

namespace App\Support;

class Tenant
{
    protected static ?int $companyId = null;

    public static function setCompanyId(?int $id): void
    {
        self::$companyId = $id;
    }

    public static function getCompanyId(): ?int
    {
        return self::$companyId;
    }
}