<?php

namespace BankKata\Test\Acceptance;

use BankKata\Account;
use BankKata\Date;
use BankKata\Transactions;
use PHPUnit\Framework\TestCase;

class AccountServiceTest extends TestCase
{
    private $account;

    public function setUp(): void
    {
        $transactions = new Transactions();
        $this->date = $this->createMock(Date::class);
        $this->account = new Account($transactions, $this->date);
    }

    /** @test */
    public function should_print_all_transactions()
    {
        $expectedOutput = 'Date       || Amount || Balance\n' .
                        '14/01/2012 || -500   || 2500\n' .
                        '13/01/2012 || 2000   || 3000\n' .
                        '10/01/2012 || 1000   || 1000\n';

        $this->date->method('asString')
                    ->willReturnOnConsecutiveCalls('10/01/2012', '13/01/2012', '14/01/2012');

        $this->account->deposit(1000);
        $this->account->deposit(2000);
        $this->account->withdraw(500);

        $this->account->printStatement();

        $this->expectOutputString($expectedOutput);
    }
}
