<?php

interface QueryBus
{
    public function handle(Query $query);
}