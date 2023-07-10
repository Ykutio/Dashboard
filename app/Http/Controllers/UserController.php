<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserController extends Controller {

    public function showuser($id) {
        $user = User::getUser($id);
        $logged_inn_user = Session::get('user_id');
        if (empty($logged_inn_user)) {
            return redirect()->route('home')->withErrors('Вы не вошли в ваш профиль');
        }
        return view('user.profile', [
            'user' => $user,
            'logged_inn_user' => $logged_inn_user
        ]);
    }

    public function update($id, Request $request) {
        $messages = [
            'password_confirmation.same' => 'Введенные данные в полях "Введите ваш пароль" и "Подтвердите ваш пороль" должны совпадать.'
        ];

        $this->validate($request, [
            'password_confirmation' => 'required_with:password|same:password'
                ], $messages);
//      dump($request->file('user_image')->getClientOriginalName());
//      dd( get_class_methods( $request->file('user_image')));
        $user = User::getUser($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path() . '/images/';
            $filename = $request->file('image')->getClientOriginalName();
            $image->move($path, $filename);
            $user->image = '/images/' . $filename;
        }

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->adress = $request->input('adress');
        $user->telephone = $request->input('telephone');
        $user->card_bank = $request->input('card_bank');
        $user->card_number = $request->input('card_number');
        if ($request->filled('password')) {
            $user->password = $request->input('password');
        }
//      dd($request->all());

        $user->update();

        return redirect()->route('user.show', $id)->withSuccess('Ваш профиль был успешно обновлен');
    }
}
