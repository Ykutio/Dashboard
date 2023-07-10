<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller {

    public static function searching(Request $request) {
        $rules = [
            'search_field' => 'min:3|max:30'
        ];

        $messages = [
            'search_field.min' => 'Поле "Search" должно содержать более 3 символа.',
            'search_field.max' => 'Поле "Search" должно содержать менее 30 символов.'
        ];

        $request->validate($rules,$messages);

        $search_field = $request->get('search_field');
        $weapons = Search::getWeaponsForSearch($search_field);
        //dump(get_class_methods($weapons));
        return view('user.searchview', [
            'weapons' => $weapons,
            'search_field' => $search_field
        ]);
    }

}
