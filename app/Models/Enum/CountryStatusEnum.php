<?php

namespace App\Models\Enum;

enum CountryStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getCountryStatusMap(): array
    {
        return [
            self::ACTIVE->value => 'Активный',
            self::INACTIVE->value => 'Не активный',
        ];
    }
}
