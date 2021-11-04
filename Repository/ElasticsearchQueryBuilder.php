<?php
class ElasticsearchQueryBuilder implements  QueryBuilder
{
    private Query $query;

    public function __construct(ElasticSerachQuery $query)
    {
        $this->query = $query;
    }

    public function setFrom(string $resource): void
    {
        // TODO: Implement setFrom() method.
    }

    public function addSelectFields(array $fields): void
    {
        // TODO: Implement addSelectFields() method.
    }

    public function addSearch(string $filedName, string $value): void
    {
        // TODO: Implement addSearch() method.
    }

    public function addRange(string $filedName, string $valueFrom, string $valueTo): void
    {
        // TODO: Implement addRange() method.
    }

    public function addOrder(string $filedName, string $order): void
    {
        // TODO: Implement addOrder() method.
    }

    public function setMaxResult(int $maxResult): void
    {
        // TODO: Implement setMaxResult() method.
    }

    public function setOffset(int $offset): void
    {
        // TODO: Implement setOffset() method.
    }

    public function getQuery(): Query
    {
        // TODO: Implement getQuery() method.
    }

    public function addSearchInAllFields(string $value): void
    {
        // TODO: Implement addSearchInAllFields() method.
    }
}
