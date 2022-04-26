<?php

namespace BankKata\Test\Unit;

use BankKata\Transaction;
use BankKata\Transactions;
use PHPUnit\Framework\TestCase;

class TransactionsTest extends TestCase
{
    /** @test */
    public function should_add_transaction(): void
    {
        $transactions = new Transactions();
        $transaction = new Transaction('', 200);
        $transactions->add($transaction);

        $this->assertTrue(sizeof($transactions->all()) === 1);
    }
}
