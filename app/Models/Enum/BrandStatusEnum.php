<?php

namespace App\Models\Enum;

enum BrandStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getBrandStatusMap(): array
    {
        return [
            self::ACTIVE->value => 'Активный',
            self::INACTIVE->value => 'Не активный',
        ];
    }
}
