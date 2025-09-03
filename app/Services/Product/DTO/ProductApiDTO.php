<?php

namespace App\Services\Product\DTO;

class ProductApiDTO
{
    private ?int $perPage;
    private ?int $offset;
    private ?string $sortField;
    private ?string $sortOrder;


    public function __construct(
        ?int $perPage = null,
        ?int $offset = null,
        ?string $sortField = null,
        ?string $sortOrder = null
    ) {
        $this->perPage = $perPage;
        $this->offset = $offset;
        $this->sortField = $sortField;
        $this->sortOrder = $sortOrder;
    }

    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }
}
