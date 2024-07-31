<?php

namespace Domain;

class Person
{
    protected string $name;
    private CPF $cpf;

    public function __construct(string $name, CPF $cpf)
    {
        $this->validateHolderName($name);
        $this->name = $name;
        $this->cpf = $cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf->getNumber();
    }

    protected function validateHolderName(string $holderName): void
    {
        if (strlen($holderName) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }
}
