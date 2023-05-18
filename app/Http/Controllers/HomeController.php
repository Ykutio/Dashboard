<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Type;
use App\Models\User;
use Session;

class HomeController extends Controller {

    public function index(Request $request) {
        $types = Type::all();

        $user_id = Session::get('user_id');
        $user = null;
        //code below is for cookeis
        $minutes = 60;
        $response = new Response('Set Cookie');
        $value = '';
        $visitCounter = 0;
        if ($user_id) {
//            $user = Siteuser::getUserForShowCoverPage();
            $user = User::where( 'id', $user_id )->first(); //<- Перенес в модель Siteuser
            //$cookie = cookie($user->name, 'value', $minutes);// setCookie by php
            if (cookie($user->name)) {
                $visitCounter = cookie($user->name, $visitCounter, $minutes);
                $visitCounter++;
                //echo $visitCounter;//testing 1-2
            }
            $response->withCookie(cookie($user->name, $visitCounter, $minutes)); // setCookie by Laravel
            $value = $request->cookie($user->name); //getCookie
            //dump($visitCounter);//testing 2-2
            //Cookie::queue( $user->name, $request->test, $minutes ); // Second variant setCookie and then getCookie
            //$cookie = Cookie::get( 'name' );
        }
        return view('user.index', [
            'types' => $types,
            'user' => $user,
            'response' => $response,
            'value' => $value,
            'visitCounter' => $visitCounter
                //'cookie' => $cookie
                ]);
    }
}
