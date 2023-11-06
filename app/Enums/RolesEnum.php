<?php

namespace App\Enums;

enum RolesEnum: string
{
    case Admin = 'admin';
    case Farmer = 'farmer';
    case Company = 'company';

    public function getRole(): string
    {
        return match ($this) {
            static::Admin => 'Admin',
            static::Farmer => 'Farmer',
            static::Company => 'Company',
        };
    }
}