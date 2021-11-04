<?php

class CandidateCollection extends ArrayObject implements SerializableInterface
{
    public function serialize(): array
    {
        return parent::getArrayCopy();
    }
}