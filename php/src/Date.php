<?php

namespace BankKata;

class Date
{
    private $date;

    public function __construct(string $date)
    {
        $this->date = strtotime($date);
    }

    public function asString(): string
    {
        return date("d/m/Y", $this->date);
    }
}
