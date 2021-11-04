<?php

interface ResponseInterface
{
    public static function create(array $data, int $statusCode): self;

}