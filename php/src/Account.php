<?php

namespace BankKata;

use http\Exception\InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class Account implements AccountService
{
    public $transactions;

    public function deposit(int $amount): void
    {
        if ($amount <= 0) {
            throw new \InvalidArgumentException('The amount can not be zero or negative');
        }

        $this->transactions[] = $amount;
    }

    public function withdraw(int $amount): void
    {

    }

    public function printStatement(): void
    {

    }
}
