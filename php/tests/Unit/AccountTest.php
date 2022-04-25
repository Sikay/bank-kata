<?php

namespace BankKata\Test\Unit;

use BankKata\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    private $account;

    public function setUp(): void
    {
        $this->account = new Account();
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
        $this->account->deposit(300);
        $this->assertTrue($this->account->transactions[0] === 300);
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
        $this->account->withdraw(300);
        $this->assertTrue($this->account->transactions[0] === -300);
    }
}
