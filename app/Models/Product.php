<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'img',
        'price',
        'brand_id',
        'cat_id',
        'country_id',
        'quantity',
        'status'
    ];

    use HasFactory;

    public static function productCount(): int
    {
        return Product::all()->count();
    }

    public static function products(): LengthAwarePaginator
    {
        return Product::orderBy('id', 'asc')
            ->paginate(10);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
