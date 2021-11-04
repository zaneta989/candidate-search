<?php

class CandidateElasticSearchRepository implements CandidateRepository
{
    private SerializerInterface $serializer;
    private QueryBuilder $queryBuilder;

    public function __construct(SerializerInterface $serializer, QueryBuilder $queryBuilder)
    {
        $this->serializer = $serializer;
        $this->queryBuilder = $queryBuilder;
    }

    public function findCandidates(PaginatedQueryParametersInterface $paginatedQueryParameters): ReadModelCollection
    {
        $phrase = '*' . $paginatedQueryParameters->getSearchFilter('phrase') . '*';

        $this->queryBuilder->addSelectFields(['email', 'firstName', 'lastName', 'tags', 'notes']);
        $this->queryBuilder->setFrom('candidate');
        $this->queryBuilder->addSearchInAllFields($phrase);
        $this->queryBuilder->addRange(
            'dateOfBirth',
            $paginatedQueryParameters->getSearchFilter('dateBirthTo'),
            $paginatedQueryParameters->getSearchFilter('dateBirthTo')
        );
        $this->queryBuilder->setMaxResult($paginatedQueryParameters->getItemsPerPage());
        $this->queryBuilder->setOffset($paginatedQueryParameters->getOffset());

        foreach ($paginatedQueryParameters->getOrderFilters() as $field => $order) {
            $this->queryBuilder->addOrder($field, $order);
        }

        $result = $this->queryBuilder->getQuery()->getResult();

        return new ReadModelCollection(
            $paginatedQueryParameters->getItemsPerPage(),
            new CandidateCollection(array_map(
                fn(array $item) => new Candidate($item['firstName'], $item['lastName'], $item['email'], $item['tags'],
                    $item['notes']),
                $result
            )));
    }
}