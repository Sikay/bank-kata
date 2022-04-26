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
        $transaction = new Transaction('14/02/2017', 200);
        $transactions->add($transaction);

        $this->assertTrue(sizeof($transactions->all()) === 1);
    }

    /** @test */
    public function should_fail_if_add_transaction_in_different_order(): void
    {
        $transactions = new Transactions();
        $deposit = new Transaction('14/02/2017', 400);
        $withdraw = new Transaction('15/02/2017', -200);

        $transactions->add($deposit);
        $transactions->add($withdraw);

        $this->assertTrue(sizeof($transactions->all()) === 2);
        $this->assertNotSame($transactions->all()[0], $withdraw);
        $this->assertNotSame($transactions->all()[1], $deposit);
    }

    /** @test */
    public function should_add_transaction_in_the_same_order(): void
    {
        $transactions = new Transactions();
        $deposit = new Transaction('14/02/2017', 400);
        $withdraw = new Transaction('15/02/2017', -200);

        $transactions->add($deposit);
        $transactions->add($withdraw);

        $this->assertTrue(sizeof($transactions->all()) === 2);
        $this->assertSame($transactions->all()[0], $deposit);
        $this->assertSame($transactions->all()[1], $withdraw);
    }
}
