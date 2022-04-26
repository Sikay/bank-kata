<?php

namespace BankKata;

class Transaction
{
    private $date;
    private $amount;

    public function __construct(string $date, int $amount)
    {
        $this->date = $date;
        $this->amount = $amount;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function date(): string
    {
        return $this->date;
    }


}
