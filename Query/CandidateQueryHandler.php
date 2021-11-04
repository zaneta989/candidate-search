<?php

class CandidateQueryHandler implements QueryHandler
{
    private CandidateRepository $candidateRepository;

    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function handle(CandidateQuery $candidateQuery): ReadModelCollection
    {
        return $this->candidateRepository->findCandidates($candidateQuery->getPaginatedQueryParameters());
    }
}