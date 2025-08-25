<?php

namespace App\Models\Country\Enum;

enum CountryStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getCountryStatusMap(): array
    {
        return [
            self::ACTIVE->value => 'Active',
            self::INACTIVE->value => 'Not Active',
        ];
    }
}
