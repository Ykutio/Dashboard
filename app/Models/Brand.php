<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    use HasFactory;

    public static function brand_count(): int
    {
        return Brand::all()->count();
    }

    /**
     * @return Collection|static
     */
    public static function brands(): Collection|array
    {
        return Brand::orderBy('id', 'asc')->get();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
