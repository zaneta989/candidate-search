<?php

class Candidate implements SerializableInterface
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private ?array $tags;
    private ?array $notes;

    public function __construct(string $firstName, string $lastName, string $email, array $tags, array $notes)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->tags = $tags;
        $this->notes = $notes;
    }


    public function serialize(): array
    {
        $data = [
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
        ];

        if ($this->tags && !empty($this->tags)) {
            $data['tags'] = $this->tags;
        }

        if ($this->notes && !empty($this->notes)) {
            $data['notes'] = $this->notes;
        }

        return $data;
    }
}