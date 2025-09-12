<?php

namespace App\Services\Product\DTO;

class ProductDTO
{
    public function __construct(
        private readonly ?int $brand_id = null,
        private readonly ?int $category_id = null,
        private readonly ?int $country_id = null,
        private readonly ?string $status = null,
        private readonly ?string $search = null
    ) {
    }

    public function getProductBrand(): ?int
    {
        return $this->brand_id;
    }

    public function getProductCategory(): ?int
    {
        return $this->category_id;
    }

    public function getProductCountry(): ?int
    {
        return $this->country_id;
    }

    public function getProductStatus(): ?string
    {
        return $this->status;
    }

    public function getProductSearch(): ?string
    {
        return $this->search;
    }

}
