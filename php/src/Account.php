<?php

namespace BankKata;

use http\Exception\InvalidArgumentException;

class Account implements AccountService
{
    private const MIN_AMOUNT = 0;
    public $transactions;

    public function __construct(Transactions $transactions)
    {
        $this->transactions = $transactions;
    }

    public function deposit(int $amount): void
    {
        $this->validAmount($amount);

        $this->transactions->add($amount);
    }

    public function withdraw(int $amount): void
    {
        $this->validAmount($amount);

        $this->transactions->add(-$amount);
    }

    public function printStatement(): void
    {

    }

    private function validAmount(int $amount): void
    {
        if ($amount <= self::MIN_AMOUNT) {
            throw new \InvalidArgumentException('The amount can not be zero or negative');
        }
    }
}
