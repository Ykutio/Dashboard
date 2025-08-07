<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public static function country_count(): int
    {
        return Country::all()
            ->count();
    }

    public static function countries(): Collection|array
    {
        return Country::orderBy('id', 'asc')
            ->get();
    }
}
