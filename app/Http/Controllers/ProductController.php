<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;

class ProductController extends Controller
{

    public function oneproduct($id)
    {
        $weapon = Weapon::getWeapon($id);


        if (empty($weapon)) {
            return redirect()->route('home')->with('success', 'your message,here');
        }
        $releatedProducts = Weapon::getWeapons($weapon->type_id, $id, 3);
        Weapon::getCountViews($weapon);
        $showMostViewedPrduct = Weapon::showMostViewedPrduct();
        return view('user.product', [
            'weapon' => $weapon,
            'releatedProducts' => $releatedProducts,
            'showMostViewedPrduct' => $showMostViewedPrduct
        ]);
    }

}
