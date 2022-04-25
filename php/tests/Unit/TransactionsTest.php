<?php

namespace BankKata\Test\Unit;

use BankKata\Transactions;
use PHPUnit\Framework\TestCase;

class TransactionsTest extends TestCase
{
    /** @test */
    public function should_add_transaction(): void
    {
        $transactions = new Transactions();
        $transactions->add(200);

        $this->assertTrue(sizeof($transactions->all()) === 1);
    }
}
