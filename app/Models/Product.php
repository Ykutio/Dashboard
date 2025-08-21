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
        'category_id',
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
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public static function productsByFilter(array $params = []): LengthAwarePaginator
    {
        $query = Product::query();

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }
        if (!empty($params['category_id'])) {
            $query->where('category_id', $params['category_id']);
        }
        if (!empty($params['country_id'])) {
            $query->where('country_id', $params['country_id']);
        }
        if (!empty($params['brand_id'])) {
            $query->where('brand_id', $params['brand_id']);
        }
        if (!empty($params['search'])) {
            $query->where(function ($query) use ($params): void {
                $query->where('name', 'LIKE', '%' . $params['search'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $params['search'] . '%');
            });
        }
        return $query->paginate(self::PAGE_LIMIT);
    }
}
