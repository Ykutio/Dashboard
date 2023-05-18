<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;

class ProductController extends Controller {

    public function oneproduct($id) {
        $weapon = Weapon::getWeapon($id);
        return view('user.product', [ 'weapon' => $weapon ]);
    }

}
