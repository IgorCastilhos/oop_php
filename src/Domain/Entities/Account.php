<?php

namespace Entities;

class Account
{
    private int $balance;
    private static int $numberOfAccounts = 0;

    public function __construct(private Holder $holder)
    {
        $this->holder = $holder;
        $this->balance = 0;

        self::$numberOfAccounts++;
    }

    public function __destruct()
    {
        self::$numberOfAccounts--;
    }

    public function deposit(float $value): void
    {
        if ($value < 0) {
            echo "Valor de depósito precisa ser positivo";
            return;
        }
        $this->balance += $value;
    }

    public function withdraw(float $value): void
    {
        if ($value > $this->balance) {
            echo "Saldo indisponível";
            return;
        }
        $this->balance -= $value;
    }

    public function transfer(float $value, Account $receiverAccount): void
    {
        if ($value > $this->balance) {
            echo "Saldo indisponível";
            return;
        }
        $this->withdraw($value);
        $receiverAccount->deposit($value);
    }

    public function getHolderName(): string
    {
        return $this->holder->getName();
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getHolderCpf(): string
    {
        return $this->holder->getCpf();
    }

    public static function getNumberOfAccounts(): int
    {
        return self::$numberOfAccounts;
    }
}
