<?php

namespace Domain;

class Employee extends Person
{
    private string $position;

    public function __construct(string $name, CPF $cpf, string $position)
    {
        parent::__construct($name, $cpf);
        $this->position = $position;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function changeName(string $name): void
    {
        $this->validateHolderName($name);
        $this->name = $name;
    }
}

