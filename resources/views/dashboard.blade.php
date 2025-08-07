<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<?php
    $currentUser = app('Illuminate\Contracts\Auth\Guard')->user();
    //dump($currentUser);
    $users = app('App\Models\User')->get();
    //dump($users);
    $select = 'SELECT * FROM `model_has_roles` WHERE model_id = 1';
    $userRole = app('Illuminate\Support\Facades\DB')::select($select);
    //dump($userRole);
    $name = Auth::user()->name;
    if(Auth::user()->hasRole('admin')){
        echo 'Yes, you == ADMIN';
    }
    dump($name);
?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
