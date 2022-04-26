<?php

namespace BankKata;

use http\Exception\InvalidArgumentException;

class Account implements AccountService
{
    private const MIN_AMOUNT = 0;
    private $transactions;
    private $date;

    public function __construct(Transactions $transactions, Date $date)
    {
        $this->transactions = $transactions;
        $this->date = $date;
    }

    public function deposit(int $amount): void
    {
        $this->validAmount($amount);
        $deposit = new Transaction($this->date->asString(), $amount);
        $this->transactions->add($deposit);
    }

    public function withdraw(int $amount): void
    {
        $this->validAmount($amount);
        $withdraw = new Transaction($this->date->asString(), -$amount);
        $this->transactions->add($withdraw);
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
