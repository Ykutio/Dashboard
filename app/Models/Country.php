<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Country extends Model
{
    protected $fillable  = ['name', 'status'];

    use HasFactory;

    public static function countryCount(): int
    {
        return Country::all()
            ->count();
    }

    public static function countries(): LengthAwarePaginator
    {
        return Country::orderBy('id', 'asc')
            ->paginate(5);
    }
}
