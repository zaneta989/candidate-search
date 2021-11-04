<?php

declare(strict_types=1);

class PaginatedQueryParametersExtractor
{
    public function extractFromRequest(RequestInterface $request): PaginatedQueryParameters
    {
        $page = (int) $request->getQuery('page', 1);
        $itemsPerPage = (int) $request->getQuery('itemsPerPage', 20);
        $orderFilters = $request->getQuery('order', []);
        $searchFilters = $request->getQuery('search', []);

        $phrase = $searchFilter['phrase'] ?? null;

        if ($phrase || $phrase === '' || strlen($searchFilter['phrase']) > 2000) {
            throw new PaginatedQueryParametersException('Phrase is required');
        }

        if (strlen($phrase) > 2000) {
            throw new PaginatedQueryParametersException('Phrase should have length maximum 2000');
        }

        return new PaginatedQueryParameters($page, $itemsPerPage, $orderFilters, $searchFilters);
    }
}
