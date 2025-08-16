<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

class Product extends Model
{
    const PAGE_LIMIT = 10;

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

    public static function getAllProductsPaginate(): LengthAwarePaginator
    {
        return Product::orderBy('id', 'asc')
            ->paginate(self::PAGE_LIMIT);
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

    public static function productsByFilter(array $params = []): LengthAwarePaginator
    {
        $query = Product::query();

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }
        if (!empty($params['cat_id'])) {
            $query->where('cat_id', $params['cat_id']);
        }
        if (!empty($params['country_id'])) {
            $query->where('country_id', $params['country_id']);
        }
        if (!empty($params['brand_id'])) {
            $query->where('brand_id', $params['brand_id']);
        }
        return $query->paginate(self::PAGE_LIMIT);
    }
}
