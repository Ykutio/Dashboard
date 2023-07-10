<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\Models\Type;
use App\Models\Country;
use App\Http\Requests\TypeRequest;

class TypeController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = Type::getAllTypes();
//        dump($items);
        return view('Administrator.types.index', [
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
        return view('Administrator.types.add', [
            'types' => $types,
            'countries' => $countries,
            'items' => $items,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\TypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request) {
        $TypeInsert = Type::AddType($request);
        if (!$TypeInsert) {
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
        $item = Type::find($id);

        if (!$item) {
            return redirect()->back();
        }
        $types = Type::getAllTypes();

        return view('Administrator.types.edit', [
            'item' => $item,
            'types' => $types
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\TypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id) {
        $Type = Type::find($id);

        if (!$Type) {
            return redirect()->back();
        }

        $TypeUpdate = Type::UpdateType($request, $Type);

        if (!$TypeUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $Type = Type::find($id);
        if (!$Type || !$Type->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }

    public function changeStatus(Request $request) {
        $ID = $request->id;
        $Type = Type::find($ID);
        if (!$Type) {
            return response()->json(['status' => 0]);
        }

        $Type->status = $Type->status ? 0 : 1;
        if (!$Type->update()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function orderingType(Request $request) {
        $orders = json_decode($request->ordering);
        foreach ($orders as $value) {
            $question = Type::find($value[0]);
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
