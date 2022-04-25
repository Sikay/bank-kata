<?php

namespace BankKata\Test\Acceptance;

use BankKata\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function should_print_all_transactions()
    {
        $expectedOutput = 'Date       || Amount || Balance\n' .
                        '14/01/2012 || -500   || 2500\n' .
                        '13/01/2012 || 2000   || 3000\n' .
                        '10/01/2012 || 1000   || 1000';

        $account = new Account();
        $account->deposit(1000);
        $account->deposit(2000);
        $account->withdraw(500);

        $account->printStatement();

        $this->expectOutputString($expectedOutput);
    }
}
