<?php

class SearchController
{
    private CandidateSearcher $searcher;
    private PaginatedQueryParametersExtractor $extractor;
    private SerializerInterface $serializer;

    public function __construct(
        CandidateSearcher $searcher,
        PaginatedQueryParametersExtractor $extractor,
        SerializerInterface $serializer
    ) {
        $this->searcher = $searcher;
        $this->extractor = $extractor;
        $this->serializer = $serializer;
    }

    public function search(RequestInterface $request): ResponseInterface
    {
        try {
            return ResponseInterface::create(
                $this->serializer->serialize($this->searcher->search($this->extractor->extractFromRequest($request))),
                200
            );
        } catch (PaginatedQueryParametersException $exception) {
            return ResponseInterface::create(null, 400);
        }
    }
}