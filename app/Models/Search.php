<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Weapon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Search extends Model {

    use HasFactory;

    public static function getWeaponsForSearch(string $search_field): LengthAwarePaginator {
        return Weapon::where('name', 'LIKE', '%' . $search_field . '%')
                        ->select('*')
                        ->paginate(9);
    }

}
