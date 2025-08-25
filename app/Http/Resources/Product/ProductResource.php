<?php

namespace App\Http\Resources\Product;

use App\Constants\DataFormat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'img' => $this->img,
            'price' => $this->price,
            'price' => $this->price,
            'brand' => ProductListResource::make($this->brand),
            'category' => ProductListResource::make($this->category),
            'country' => ProductListResource::make($this->country),
            'quantity' => $this->quantity,
            'status' => $this->status,
            'created_at' => $this->created_at->format(DataFormat::DATA_FORMAT),
        ];
    }
}
