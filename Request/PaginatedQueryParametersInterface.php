<?php

interface PaginatedQueryParametersInterface
{
    public function getPage(): int;
    public function getItemsPerPage(): int;
    public function getOrderFilters(): array;
    public function getSearchFilters(): array;
    public function getOffset(): int;
    public function getSearchFilter(string $key): string ;
    public function getOrderFilter(string $key): string ;
}