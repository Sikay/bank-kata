<?php

namespace BankKata\Test\Unit;

use BankKata\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function should_not_deposit_negative_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $account = new Account();
        $account->deposit(-1000);
    }

    /** @test */
    public function should_not_deposit_zero_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $account = new Account();
        $account->deposit(0);
    }

    /** @test */
    public function should_deposit_money(): void
    {
        $account = new Account();
        $account->deposit(300);

        $this->assertTrue($account->transactions[0] === 300);
    }

    /** @test */
    public function should_not_withdraw_zero_money(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $account = new Account();
        $account->withdraw(0);
    }
}
