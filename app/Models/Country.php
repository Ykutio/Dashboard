<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    use HasFactory;

    public static function getAllCountries() {
        return $countries = Country::all();
    }

    public static function getCountry($id) {
        return DB::table('countrues')->where('countrues.id', '=', $id)->first();
    }

    public static function AddCountry($request) {
        $country = new Country();
        $country->name = $request->name;
        if ($country->save()) {
            return true;
        }
        return false;
    }

    public static function UpdateCountry($request, Country $country) {
        $country->name = $request->name;
        if ($country->update()) {
            return true;
        }
        return false;
    }

}
