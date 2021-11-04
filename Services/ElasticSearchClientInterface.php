<?php

interface ElasticSearchClientInterface
{
    public function search(array $params): array;
}