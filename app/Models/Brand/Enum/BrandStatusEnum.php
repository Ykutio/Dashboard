<?php

namespace App\Models\Brand\Enum;

enum BrandStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getBrandStatusMap(): array
    {
        return [
            self::ACTIVE->value => 'Active',
            self::INACTIVE->value => 'Not Active',
        ];
    }
}
