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
        $header = 'Date       || Amount || Balance\n';
        $body = '';
        $totalAmount = 0;
        foreach ($this->transactions->all() as $transaction) {
            $totalAmount += $transaction->amount();
        }
        $transactionShort = array_reverse($this->transactions->all());
        foreach ($transactionShort as $transaction) {
            $body .= $transaction->date() . ' || ' . $transaction->amount() . '   || ' . $totalAmount . '\n';
            $totalAmount -= $transaction->amount();
        }
        $statement = $header . $body;
        print($statement);
    }

    private function validAmount(int $amount): void
    {
        if ($amount <= self::MIN_AMOUNT) {
            throw new \InvalidArgumentException('The amount can not be zero or negative');
        }
    }
}
