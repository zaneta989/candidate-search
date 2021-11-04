<?php

class SearchController
{
    private QueryBus $queryBus;
    private PaginatedQueryParametersExtractor $extractor;
    private SerializerInterface $serializer;

    public function __construct(
        QueryBus $queryBus,
        PaginatedQueryParametersExtractor $extractor,
        SerializerInterface $serializer
    ) {
        $this->extractor = $extractor;
        $this->serializer = $serializer;
        $this->queryBus = $queryBus;
    }

    public function search(RequestInterface $request): ResponseInterface
    {
        try {
            return ResponseInterface::create(
                $this->serializer->serialize($this->queryBus->handle(new CandidateQuery($this->extractor->extractFromRequest($request)))),
                200
            );
        } catch (PaginatedQueryParametersException $exception) {
            return ResponseInterface::create(null, 400);
        }
    }
}