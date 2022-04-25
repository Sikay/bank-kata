<?php

namespace BankKata;

use http\Exception\InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class Account implements AccountService
{
    public $transactions;

    public function deposit(int $amount): void
    {
        $this->validAmount($amount);

        $this->transactions[] = $amount;
    }

    public function withdraw(int $amount): void
    {
        $this->validAmount($amount);

        $this->transactions[] = - $amount;
    }

    public function printStatement(): void
    {

    }

    private function validAmount(int $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('The amount can not be zero or negative');
        }
    }
}
