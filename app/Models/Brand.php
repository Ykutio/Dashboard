<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Pagination\LengthAwarePaginator;

class Brand extends Model
{
    protected $fillable  = ['name', 'country_id', 'status'];

    use HasFactory;

    public static function brandCount(): int
    {
        return Brand::all()->count();
    }

    /**
     * @return Collection|static
     */
    public static function brands(): LengthAwarePaginator
    {
        return Brand::orderBy('id', 'asc')
            ->paginate(10);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
