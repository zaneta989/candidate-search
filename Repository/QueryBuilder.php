<?php

interface QueryBuilder
{
    public function setFrom(string $resource): void;
    public function addSelectFields(array $fields): void;
    public function addSearch(string $filedName, string $value): void;
    public function addSearchInAllFields(string $value): void;
    public function addRange(string $filedName, string $valueFrom, string $valueTo): void;
    public function addOrder(string $filedName, string $order): void;
    public function setMaxResult(int $maxResult): void;
    public function setOffset(int $offset): void;
    public function getQuery(): Query;
}