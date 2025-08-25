<?php

namespace App\Models\Product;

use App\Constants\SortDirection;
use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\Country\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product\Enum\ProductStatusEnum;

class Product extends Model
{
    const PAGE_LIMIT = 10;
    const PER_PAGE = 100;

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

    public static function productCount(bool $isActive = false): int
    {
        $query = Product::query();
        if($isActive){
            return $query
                ->where('status', '=',ProductStatusEnum::ACTIVE)
                ->count();
        }
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

    public static function getProductsList(
        int $perPage = self::PER_PAGE,
        int $offset = 0,
        string $sortField = 'id',
        string $sortDirection = SortDirection::ASC
    ): Collection {
        return Product::query()
            ->limit($perPage)
            ->offset($offset)
            ->orderBy($sortField, $sortDirection)
            ->where('status', '=', ProductStatusEnum::ACTIVE)
            ->get();
    }
}
