<?php

class ReadModelCollection implements SerializableInterface
{
    private int $page;
    private SerializableInterface $items;

    public function __construct(int $page, SerializableInterface $items)
    {
        $this->page = $page;
        $this->items = $items;
    }

    public function serialize(): array
    {
        return [
            'page' => $this->page,
            'items' => $this->items->serialize(),
        ];
    }
}