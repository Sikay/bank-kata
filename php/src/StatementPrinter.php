<?php

namespace BankKata;

class StatementPrinter
{
    private const STATEMENT_HEADER = 'Date       || Amount || Balance';

    public function print(array $transactions): void
    {
        $this->printHeader();
        $this->printStatement($transactions);
    }

    private function printHeader(): void
    {
        print(self::STATEMENT_HEADER . PHP_EOL);
    }

    private function printStatement(array $transactions): void
    {
        $statement = '';
        $totalAmount = $this->calculateTotalAmount($transactions);
        $transactionShort = array_reverse($transactions);
        foreach ($transactionShort as $transaction) {
            $statement .= $transaction->date() . ' || ' . $transaction->amount() . '   || ' . $totalAmount . PHP_EOL;
            $totalAmount -= $transaction->amount();
        }

        print($statement);
    }

    private function calculateTotalAmount(array $transactions): int
    {
        $totalAmount = 0;
        foreach ($transactions as $transaction) {
            $totalAmount += $transaction->amount();
        }
        return $totalAmount;
    }
}
