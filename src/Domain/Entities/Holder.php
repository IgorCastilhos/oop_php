<?php

namespace Entities;

use Domain\Address;
use Domain\CPF;
use Domain\Person;

class Holder extends Person
{
    private Address $address;

    public function __construct(CPF $cpf, string $name, Address $address)
    {
        parent::__construct($name, $cpf);
        $this->address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}
