<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CountryRequest;

class CountryController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $items = Country::getAllCountries();
//        dump($items);
        return view('Administrator.countries.index', [
            'items' => $items,
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $items = Country::getAllCountries();
        return view('Administrator.countries.add', [
            'items' => $items
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request) {
        //dd($request);
        $CountryInsert = Country::AddCountry($request);
        if (!$CountryInsert) {
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
        $item = Country::find($id);

        if (!$item) {
            return redirect()->back();
        }

        return view('Administrator.countries.edit', [
            'item' => $item
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CountryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id) {
        $Country = Country::find($id);

        if (!$Country) {
            return redirect()->back();
        }

        $CountryUpdate = Country::UpdateCountry($request, $Country);

        if (!$CountryUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $Country = Country::find($id);
        if (!$Country || !$Country->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }

    public function changeStatus(Request $request) {
        $ID = $request->id;
        $Country = Country::find($ID);
        if (!$Country) {
            return response()->json(['status' => 0]);
        }

        $Country->status = $Country->status ? 0 : 1;
        if (!$Country->update()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function orderingCountry(Request $request) {
        $orders = json_decode($request->ordering);
        foreach ($orders as $value) {
            $question = Country::find($value[0]);
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
