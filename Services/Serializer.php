<?php

class Serializer implements SerializerInterface
{
    public function serialize(SerializableInterface $object): array
    {
        return $object->serialize();

    }
}