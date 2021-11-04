<?php

class ApiJsonResponse implements ResponseInterface
{
    public function __construct($data = null, int $status = 200)
    {
    }

    public static function create(array $data, int $statusCode): ResponseInterface
    {
        return new ApiJsonResponse($data, $statusCode);
    }
}