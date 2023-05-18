<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model {

    use HasFactory;

    public static function getWeapon($id) {
        $weapon = Weapon::leftjoin('types', 'weapons.type_id', '=', 'types.id')
                ->leftjoin('countries', 'weapons.country_id', '=', 'countries.id')
                ->select('weapons.*', 'types.name as types_name', 'countries.name as country_name')
                ->where('weapons.id', '=', $id)
                ->first();
        return $weapon;
    }

    public static function getWeapons($type_id = null, $paginate = 9) {
        $query = Weapon::leftjoin('types', 'weapons.type_id', '=', 'types.id')
                ->leftjoin('countries', 'weapons.country_id', '=', 'countries.id')
                ->select('weapons.*', 'types.name as types_name', 'countries.name as country_name');

        if ($type_id) {
            $query->where('weapons.type_id', '=', $type_id);
        }
        return $query->paginate($paginate);
    }

}
