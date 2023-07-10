<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    use HasFactory;

    protected $fillable = ['views'];

    public static function getAllTypes() {
        return Type::all();
    }

    public static function getType($id) {
        return DB::table('types')->where('types.id', '=', $id)->first();
    }

    public static function AddType($request) {
        $type = new Type();
        $type->name = $request->name;
        $type->description = $request->description;
        if ($request->hasFile('image')) {
            $destination = 'uploads/type';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = mt_rand(11111, 99999) . time() . '.' . $extension;
            $request->file('image')->move($destination, $fileName);
            $image_src = '/uploads/type/' . $fileName;
            $type->image = $image_src;
        }

        if ($type->save()) {
            return true;
        }
        return false;
    }

    public static function UpdateType($request, Type $type) {
        $type->name = $request->name;
        $type->description = $request->description;
        if ($request->hasFile('image')) {
            $destination = 'uploads/type';
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = mt_rand(11111, 99999) . time() . '.' . $extension;
            $request->file('image')->move($destination, $fileName);
            $image_src = 'uploads/type' . $fileName;
            $type->image = $image_src;
        }
//        dd($request);
        if ($type->update()) {
            return true;
        }
        return false;
    }

}
