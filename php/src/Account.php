<?php

namespace BankKata;

use http\Exception\InvalidArgumentException;
use function PHPUnit\Framework\throwException;

class Account implements AccountService
{
    private const MIN_AMOUNT = 0;
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
        if ($amount <= self::MIN_AMOUNT) {
            throw new \InvalidArgumentException('The amount can not be zero or negative');
        }
    }
}
