<?php

namespace App\Models\Category\Enum;

enum CategoryStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getCategoryStatusMap(): array
    {
        return [
            self::ACTIVE->value   => 'Active',
            self::INACTIVE->value => 'Not Active',
        ];
    }
}
