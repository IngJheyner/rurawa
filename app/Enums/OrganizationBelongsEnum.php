<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum OrganizationBelongsEnum: string
{
    use BaseEnum;

    case COOPERATIVE = "COOP";
    case ASSOCIATION = "ASSOC";
    case FOUNDATION = "FUND";
    case COMPANY = "COMP";
    case OTHER = "OTRO";

    public function getOrganizationBelongs(): string
    {
        return match ($this) {
            self::COOPERATIVE => "Cooperativa",
            self::ASSOCIATION => "Asociación",
            self::FOUNDATION => "Fundación",
            self::COMPANY => "Empresa",
            self::OTHER => "Otro",
        };
    }
}
