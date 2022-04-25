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
}
