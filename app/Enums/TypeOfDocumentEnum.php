<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum TypeOfDocumentEnum: string
{
    use BaseEnum;

    case CARD_IDENTITY = "TI";
    case REGISTER_CIVIL = "RC";
    case ID_IDENTITY = "CC";
    case CARD_FOREIGN = "TE";
    case ID_FOREIGN = "CE";
    case PASSPORT = "PA";
    case OTHER = "OT";

    public function getTypeOfDocument(): string
    {
        return match ($this) {
            self::CARD_IDENTITY => "Tarjeta de identidad",
            self::REGISTER_CIVIL => "Registro civil",
            self::ID_IDENTITY => "Cédula de ciudadanía",
            self::CARD_FOREIGN => "Tarjeta de extranjería",
            self::ID_FOREIGN => "Cédula de extranjería",
            self::PASSPORT => "Pasaporte",
            self::OTHER => "Otro",
        };
    }
}
