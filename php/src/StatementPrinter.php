<?php

namespace BankKata;

class StatementPrinter
{
    public function print(array $transactions): void
    {
        $header = 'Date       || Amount || Balance\n';
        $body = '';
        $totalAmount = 0;
        foreach ($transactions as $transaction) {
            $totalAmount += $transaction->amount();
        }
        $transactionShort = array_reverse($transactions);
        foreach ($transactionShort as $transaction) {
            $body .= $transaction->date() . ' || ' . $transaction->amount() . '   || ' . $totalAmount . '\n';
            $totalAmount -= $transaction->amount();
        }
        $statement = $header . $body;
        print($statement);
    }
}
