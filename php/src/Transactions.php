<?php

namespace BankKata;

class Transactions
{
    private $transactions;

    public function add(Transaction $transaction): void
    {
        $this->transactions[] = $transaction;
    }

    public function all(): array
    {
        return $this->transactions;
    }
}
