<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

class Brand extends Model
{
    const PAGE_LIMIT = 5;

    protected $fillable = ['name', 'country_id', 'status'];

    use HasFactory;

    public static function brandCount(): int
    {
        return Brand::all()->count();
    }

    /**
     * @return Collection|static
     */
    public static function getAllBrandsPaginate(): LengthAwarePaginator
    {
        return Brand::orderBy('id', 'asc')
            ->paginate(self::PAGE_LIMIT);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public static function brandsByFilter(array $params = []): LengthAwarePaginator
    {
        $query = Brand::query();

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }
        if (!empty($params['country_id'])) {
            $query->where('country_id', $params['country_id']);
        }
        return $query->paginate(self::PAGE_LIMIT);
    }

    public static function getAllBrands(): Collection
    {
        return Brand::orderBy('id', 'asc')->get();
    }
}
