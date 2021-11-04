<?php


interface SerializerInterface
{
    public function serialize(SerializableInterface $object): array;
}