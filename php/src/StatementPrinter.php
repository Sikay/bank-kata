<?php

namespace BankKata;

class StatementPrinter
{
    public function print(array $transactions): void
    {
        $header = 'Date       || Amount || Balance' . PHP_EOL;
        $body = '';
        $totalAmount = 0;
        foreach ($transactions as $transaction) {
            $totalAmount += $transaction->amount();
        }
        $transactionShort = array_reverse($transactions);
        foreach ($transactionShort as $transaction) {
            $body .= $transaction->date() . ' || ' . $transaction->amount() . '   || ' . $totalAmount . PHP_EOL;
            $totalAmount -= $transaction->amount();
        }
        $statement = $header . $body;
        print($statement);
    }
}
