<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum TypeOfPersonEnum: string
{
    use BaseEnum;

    case PERSON_NATURAL = "PN";
    case PERSON_LEGAL = "PL";

    public function getTypeOfPerson(): string
    {
        return match ($this) {
            self::PERSON_NATURAL => "Natural",
            self::PERSON_LEGAL => "Jurídica",
        };
    }
}
