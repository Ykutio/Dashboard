<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use View;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        config([
            'laravellocalization.supportedLocales' => [
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'EN', 'regional' => 'en_GB']
                , 'ru' => ['name' => 'Russia', 'script' => 'Latn', 'native' => 'RU', 'regional' => 'ru_RU']
            ],
            'laravellocalization.useAcceptLanguageHeader' => false,
            'laravellocalization.hideDefaultLocaleInURL' => false
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $data = [];
        //Sharing  Menu Data, Information Page With All Views
        View::composer(
                [
            //'layout.master'
            '*',
            'client.*'
                ]
                , function($view ) use ($data) {
            $user_id = Session::get('user_id');
            $user = null;
            if ($user_id) {
                $user = \App\Models\User::where('id', $user_id)->first();
            }
            $data = [
                'user_all_page' => $user,
                'information_provider' => array()
            ];

            $view->with($data);
        });
    }

}
