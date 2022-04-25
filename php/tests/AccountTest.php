<?php

namespace BankKata\Test;

use BankKata\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function change_me()
    {
        $kataTemplate = new Account();
        $this->assertTrue($kataTemplate->changeMe());
    }
}
