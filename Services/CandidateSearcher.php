<?php


class CandidateSearcher
{
    private CandidateRepository $candidateRepository;

    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function search(PaginatedQueryParametersInterface $paginatedQueryParameters): ReadModelCollection
    {
        return $this->candidateRepository->findCandidates($paginatedQueryParameters);
    }
}