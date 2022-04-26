<?php

namespace BankKata\Test\Unit;

use BankKata\Account;
use BankKata\Transaction;
use BankKata\Transactions;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    private $account;
    private $transactions;

    public function setUp(): void
    {
        $this->transactions = new Transactions();
        $this->account = new Account($this->transactions);
    }

    /** @test */
    public function should_not_deposit_negative_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->deposit(-1000);
    }

    /** @test */
    public function should_not_deposit_zero_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->deposit(0);
    }

    /** @test */
    public function should_deposit_money(): void
    {
        $deposit = new Transactions();
        $deposit->add(new Transaction('',300));
        $this->account->deposit(300);
        $this->assertEquals($this->transactions->all(), $deposit->all(), '\$canonicalize = true', 0.0, 10, true);
    }

    /** @test */
    public function should_not_withdraw_zero_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->withdraw(0);
    }

    /** @test */
    public function should_not_withdraw_negative_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->account->withdraw(-1000);
    }

    /** @test */
    public function should_withdraw_money(): void
    {
        $withdraw = new Transactions();
        $withdraw->add(new Transaction('',-300));
        $this->account->withdraw(300);
        $this->assertEquals($this->transactions->all(), $withdraw->all(), '\$canonicalize = true', 0.0, 10, true);
    }
}
