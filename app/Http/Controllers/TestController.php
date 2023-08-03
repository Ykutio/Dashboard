<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use Cart;
use Illuminate\Http\Request;

use Session;

class TestController extends Controller {

    public function testing() {

        $user_id = Session::get('user_id');
        dump($user_id);
        $Product = Weapon::find(3);
        $rowId = $Product->id; // generate a unique() row ID
        $userID = $user_id; // the user ID to bind the cart contents

        $res = Cart::session($userID)->add(array(
            'id' => $rowId,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 4,
            'attributes' => array(),
            'associatedModel' => $Product
        ));
        $items = Cart::session($user_id)->getContent();
        dd($items);
    }

    public function showCartItems() {
        $user_id = Session::get('user_id');

        $items = Cart::session($user_id)->getContent();
        dd($items);
    }
    public function index() {
        return view('user.testpage',
                [
                    //
        ]);
    }

    public function addToCart(Request $request) {
        return response()->json(['data'=>$request->id]);
    }
}
