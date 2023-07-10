<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Weapon extends Model {

    use HasFactory;

    protected $fillable = ['views'];

    public static function getWeapon($id) {
        return Weapon::leftjoin('types', 'weapons.type_id', '=', 'types.id')
                        ->leftjoin('countries', 'weapons.country_id', '=', 'countries.id')
                        ->select('weapons.*', 'types.name as types_name', 'countries.name as country_name')
                        ->where('weapons.id', '=', $id)
                        ->first();
    }

    public static function getWeapons(int $type_id = null, int $exclude_id = null, int $paginate = 9): LengthAwarePaginator {
        $query = Weapon::leftjoin('types', 'weapons.type_id', '=', 'types.id')
                ->leftjoin('countries', 'weapons.country_id', '=', 'countries.id')
                ->select('weapons.*', 'types.name as types_name', 'countries.name as country_name');

        if ($type_id) {
            $query->where('weapons.type_id', '=', $type_id);
        }
        //$exclude_id -> for releatedProducts
        if ($exclude_id) {
            $query->where('weapons.id', '!=', $exclude_id);
        }
        return $query->paginate($paginate);
    }

// For this way -> wil be updated timestamp in DB
//    public static function getCountViews(self $weapon): bool {
//        $weapon->views += 1;
//        return $weapon->update();
//    }

    public static function getCountViews(self $weapon) {
        DB::table('weapons')
                ->where('id', $weapon->id)
                ->update([
                    'views' => ++$weapon->views
        ]);
        //return $weapon->update(['views' => $weapon->views += 1]);// wil be updated timestamp in DB too
    }

    public static function showMostViewedPrduct() {
        return Weapon::select('*')
                        ->orderBy('views', 'DESC')
                        ->limit(3)->get();
    }

    public static function AddWeapons($request) {
        $weapon = new Weapon();
        $weapon->status = $request->status === 'on' ? 1 : 0;
        $max_sort = Weapon::max('status');
        $weapon->status = $max_sort ? ++$max_sort : 1;
        $weapon->name = $request->name;
        $weapon->type_id = $request->type;
        $weapon->description = $request->description;
        $weapon->tacktical_descr = $request->tacktical_descr;
        $weapon->country_id = $request->country;
        $weapon->price = $request->price;
        if ($request->hasFile('image')) {
            $destination = 'uploads/weapons';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = mt_rand(11111, 99999) . time() . '.' . $extension;
            $request->file('image')->move($destination, $fileName);
            $image_src = '/uploads/weapons/' . $fileName;
            $weapon->image = $image_src;
        }

        if ($weapon->save()) {
            return true;
        }
        return false;
    }

    public static function UpdateWeapons($request, Weapon $weapons) {
        $weapons->status = $request->status === 'on' ? 1 : 0;
        $weapons->name = $request->name;
        $weapons->type_id = $request->type;
        $weapons->description = $request->description;
        $weapons->tacktical_descr = $request->tacktical_descr;
        $weapons->country_id = $request->country;
        $weapons->price = $request->price;
        if ($request->hasFile('image')) {
            $destination = 'uploads/weapons';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = mt_rand(11111, 99999) . time() . '.' . $extension;
            $request->file('image')->move($destination, $fileName);
            $image_src = 'uploads/weapons' . $fileName;
            $weapons->image = $image_src;
        }
//        dd($request);
        if ($weapons->update()) {
            return true;
        }
        return false;
    }

}
