<?php

class PaginatedQueryParameters implements PaginatedQueryParametersInterface
{
    protected int $page;
    protected int $itemsPerPage;
    protected array $orderFilters;
    protected array $searchFilters;

    public function __construct(
        int $page = 1,
        int $itemsPerPage = 20,
        array $orderFilters = [],
        array $searchFilters = []
    ) {
        $this->page = $page;
        $this->itemsPerPage = $itemsPerPage;
        $this->orderFilters = $orderFilters;
        $this->searchFilters = $searchFilters;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    public function getOrderFilters(): array
    {
        return $this->orderFilters;
    }

    public function getSearchFilters(): array
    {
        return $this->searchFilters;
    }

    public function getOffset(): int
    {
        return $this->itemsPerPage * ($this->page - 1);
    }

    public function getSearchFilter(string $key): string
    {
        return $this->searchFilters[$key];
    }

    public function getOrderFilter(string $key): string
    {
        return $this->searchFilters[$key];
    }
}
