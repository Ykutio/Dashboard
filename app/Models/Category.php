<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Category extends Model
{
    use HasFactory;

    public static function category_count(): int
    {
        return Category::all()
            ->count();
    }

    public static function categories(): LengthAwarePaginator
    {
        return Category::orderBy('id', 'asc')
            ->paginate(5);
    }
}
