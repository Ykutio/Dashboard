<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;

class ProductsController extends Controller {

    public function allproducts($type_id = null) {
        $weapons = Weapon::getWeapons((int) $type_id);
        $weaponsForSlyder = Weapon::getWeaponsForSlyder();
        return view('user.products',
                [
            'weapons' => $weapons,
            'weaponsForSlyder' => $weaponsForSlyder
        ]);
    }

}
