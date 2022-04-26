<?php

namespace BankKata\Test\Unit;

use BankKata\Date;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    /** @test */
    public function should_return_date_as_string(): void
    {
        $date = new Date('15-09-2002');
        $this->assertSame($date->asString(), '15/09/2002');
    }
}
