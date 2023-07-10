<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class User extends Model {

    use HasFactory;

    public static function getUser($id) {
        $user = User::where('users.id', '=', $id)->first();
        return $user;
    }

}
