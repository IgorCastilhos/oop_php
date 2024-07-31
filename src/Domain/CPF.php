<?php

namespace Domain;

class CPF
{
    private int $number;

    public function __construct(string $number)
    {
        $number = filter_var($number, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($number === false) {
            echo "CPF inválido";
            exit();
        }
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
