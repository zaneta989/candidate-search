<?php

class ElasticSerachQuery implements Query
{
    private ElasticSearchClientInterface $client;

    public function __construct(ElasticSearchClientInterface $client)
    {
        $this->client = $client;
    }

    public function getResult(): array
    {
        $result = $this->client->search($this->prepareParams());

        return $this->normalizeAsArray($result);

    }

    private function prepareParams(): array
    {
        return [];
    }

    private function normalizeAsArray(array $searchResult): array
    {
        return [];
    }
}