<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Weapon;
use App\Models\Type;
use App\Models\Country;


class IndexController extends BaseController
{

    public $data = [];

    public function index()
    {
        $weapons = Weapon::all();
        $types = Type::all();
        $countries = Country::all();
        return view('Administrator.index.index' , [
            'weapons' => $weapons->count(),
            'types' => $types->count(),
            'countries' => $countries->count()
        ]);
    }


}
