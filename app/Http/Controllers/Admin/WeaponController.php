<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Models\Type;
use App\Models\Country;
use App\Http\Requests\WeaponRequest;

class WeaponController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = Weapon::getWeapons();
//        dump($items);
        return view('Administrator.weapons.index', [
            'items' => $items,
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $items = Weapon::getWeapons();
        $types = Type::getAllTypes();
        $countries = Country::getAllCountries();
        return view('Administrator.weapons.add', [
            'types' => $types,
            'countries' => $countries,
            'items' => $items,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\WeaponRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WeaponRequest $request) {
        //dd($request);
        $WeaponInsert = Weapon::AddWeapons($request);
        if (!$WeaponInsert) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('AdminMainPage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $item = Weapon::getWeapon($id);

        if (!$item) {
            return redirect()->back();
        }
        $types = Type::getAllTypes();
        $countries = Country::getAllCountries();

        return view('Administrator.weapons.edit', [
            'item' => $item,
            'types' => $types,
            'countries' => $countries
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\WeaponRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WeaponRequest $request, $id) {
        $Weapon = Weapon::find($id);

        if (!$Weapon) {
            return redirect()->back();
        }

        $WeaponUpdate = Weapon::UpdateWeapons($request, $Weapon);

        if (!$WeaponUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('weapons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $Weapon = Weapon::find($id);
        if (!$Weapon || !$Weapon->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }

    public function changeStatus(Request $request) {
        $ID = $request->id;
        $Weapon = Weapon::find($ID);
        if (!$Weapon) {
            return response()->json(['status' => 0]);
        }

        $Weapon->status = $Weapon->status ? 0 : 1;
        if (!$Weapon->update()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function orderingWeapon(Request $request) {
        $orders = json_decode($request->ordering);
        foreach ($orders as $value) {
            $question = Weapon::find($value[0]);
            if ($question) {
                $question->sort = $value[1];
            }

            if (!$question->save()) {
                return false;
            }
        }

        return "success";
    }

}
