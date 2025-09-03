<?php

namespace App\Services\Product\DTO;

class ProductDTO
{
    private ?int $brand_id;
    private ?int $category_id;
    private ?int $country_id;
    private ?string $status;
    private ?string $search;

    public function __construct(
        ?int $brand_id = null,
        ?int $category_id = null,
        ?int $country_id = null,
        ?string $status = null,
        ?string $search = null
    ) {
        $this->brand_id = $brand_id;
        $this->category_id = $category_id;
        $this->country_id = $country_id;
        $this->status = $status;
        $this->search = $search;
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
