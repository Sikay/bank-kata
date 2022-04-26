<?php

namespace BankKata\Test\Unit;

use BankKata\Transaction;
use BankKata\Transactions;
use PHPUnit\Framework\TestCase;

class TransactionsTest extends TestCase
{
    private $transactions;

    public function setUp(): void
    {
        $this->transactions = new Transactions();
    }

    /** @test */
    public function should_add_transaction(): void
    {
        $transaction = new Transaction('14/02/2017', 200);
        $this->transactions->add($transaction);

        $this->assertTrue(sizeof($this->transactions->all()) === 1);
    }

    /** @test */
    public function should_fail_if_add_transaction_in_different_order(): void
    {
        $deposit = new Transaction('14/02/2017', 400);
        $withdraw = new Transaction('15/02/2017', -200);

        $this->transactions->add($deposit);
        $this->transactions->add($withdraw);

        $this->assertTrue(sizeof($this->transactions->all()) === 2);
        $this->assertNotSame($this->transactions->all()[0], $withdraw);
        $this->assertNotSame($this->transactions->all()[1], $deposit);
    }

    /** @test */
    public function should_add_transaction_in_the_same_order(): void
    {
        $deposit = new Transaction('14/02/2017', 400);
        $withdraw = new Transaction('15/02/2017', -200);

        $this->transactions->add($deposit);
        $this->transactions->add($withdraw);

        $this->assertTrue(sizeof($this->transactions->all()) === 2);
        $this->assertSame($this->transactions->all()[0], $deposit);
        $this->assertSame($this->transactions->all()[1], $withdraw);
    }
}
