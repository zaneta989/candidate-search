<?php

interface RequestInterface
{
    public function getQuery(string $string, $default);
}