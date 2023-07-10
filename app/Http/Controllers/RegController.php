<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash; //For hiddeng password in DB

class RegController extends Controller {

    public function createuser() {
        return view('user.signin');
    }

    public function storeuser(Request $request) {
        $messages = [
            'name.required' => 'Поле "Name" необходимо заполнить.',
            'name.min' => 'Поле "Name" должно содержать более 1 символа.',
            'name.max' => 'Поле "Name" должно содержать менее 30 символов.',
            'surname.required' => 'Поле "Surname" необходимо заполнить.',
            'surname.min' => 'Поле "Surname" должно содержать более 1 символа.',
            'surname.max' => 'Поле "Surname" должно содержать менее 50 символов.',
            'email.required' => 'Поле "Email" необходимо заполнить.',
            'email.email' => 'Поле "Email" должно быть заполнено правильно.',
            'email.unique' => 'Поле "Email" должно быть уникальным.',
            'password.required' => 'Поле "Password" необходимо заполнить.',
            'password.min' => 'Поле "Password" должно содержать более 3 символов.',
            'password.max' => 'Поле "Password" должно содержать менее 20 символов.',
            'password.confirmed' => 'Поле "Password" должно совпадать.'
        ];

        $this->validate($request, [
//            'name' => 'required|string|min:1|max:30',
            'surname' => 'required|string|min:1|max:50',
            'email' => 'required|string|email|min:1|max:50|unique:users',
            'password' => 'required|string|confirmed|min:3|max:20'
                ], $messages);

        $new_user = new User();
        $new_user->name = $request->input('name');
        $new_user->surname = $request->input('surname');
        $new_user->email = $request->input('email');
        $new_user->_token = $request->input('_token');
        $new_user->password = Hash::make($request->input('password'));
//        dd($new_user);
//        dd( $request->all() );

        $new_user->save();

        Session::put('user_id', $new_user->id);
        return redirect()->route('home')->with('success', 'Ваша регистрация успешно завершенна');
    }

    public function authorization(Request $request) {
        dump($request);
        $messages = [
            'email.required' => 'Поле "Email" необходимо заполнить.',
            'email.email' => 'Поле "Email" должно быть заполнено правильно.',
            'password.required' => 'Поле "Пароль" необходимо заполнить.',
            'password.min' => 'Поле "Пароль" должно содержать более 3 символов.',
            'password.max' => 'Поле "Пароль" должно содержать менее 20 символов.',
        ];
        $this->validate($request, [
            'email' => 'required|string|email|min:1|max:50',
            'password' => 'required|string|min:3|max:20'
                ], $messages);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first(); //<- Перенес в модель Siteuser
//        $user = Siteuser::getAuthorization();
        if (!$user) {
            return redirect()->back()->with('status', 'Вы не авторизированны, не найденно такой эл.почты');
        }

        if (!Hash::check($password, $user->password)) {
            return redirect()->back()->with('status', 'Вы не авторизированны, ввели не правильный пароль');
        }
        Session::put('user_id', $user->id);

        return redirect()->route('home')->with('success', 'Ваша авторизация успешно завершенна');
    }

    public function destroycookie(Request $request) {
        $request->session()->flush();
        return redirect()->route('home')->with('status', 'Выход был успешно завершен');
    }

}