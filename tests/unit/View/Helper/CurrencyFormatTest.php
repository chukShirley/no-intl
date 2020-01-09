<?php

declare(strict_types=1);

namespace NoIntlUnitTest;

use NoIntl\View\Helper\CurrencyFormat;
use PHPUnit\Framework\TestCase;

final class CurrencyFormatTest extends TestCase
{
    public function testCanReturnUnitedStatesCurrency()
    {
        $formatter = new CurrencyFormat();
        $formatter->setLocale('en_US_POSIX');
        $actual = $formatter->__invoke(12, 'USD', true, 'en_US', null);
        $this->assertEquals('$12.00', $actual);
    }
}