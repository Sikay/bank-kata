<?php

namespace BankKata;

use http\Exception\InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class Account implements AccountService
{

    public function deposit(int $amount): void
    {
        throw new \InvalidArgumentException('The amount can not be negative');
    }

    public function withdraw(int $amount): void
    {

    }

    public function printStatement(): void
    {

    }
}
