<?php

class CandidateQuery implements Query
{
    private PaginatedQueryParametersInterface $paginatedQueryParameters;

    public function __construct(PaginatedQueryParametersInterface $paginatedQueryParameters)
    {
        $this->paginatedQueryParameters = $paginatedQueryParameters;
    }

    public function getPaginatedQueryParameters(): PaginatedQueryParametersInterface
    {
        return $this->paginatedQueryParameters;
    }
}