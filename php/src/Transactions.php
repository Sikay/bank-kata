<?php

namespace BankKata;

class Transactions
{
    private $transactions;

    public function add(int $amount): void
    {
        $this->transactions[] = $amount;
    }

    public function all(): array
    {
        return $this->transactions;
    }
}
