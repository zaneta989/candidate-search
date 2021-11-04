<?php

interface CandidateRepository
{
    public function findCandidates(PaginatedQueryParametersInterface $paginatedQueryParameters): ReadModelCollection;
}