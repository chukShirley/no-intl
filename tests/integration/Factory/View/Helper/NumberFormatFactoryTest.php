<?php

declare(strict_types=1);

namespace NoIntlIntegrationTest\Factory\View\Helper;

use NoIntl\View\Helper\NumberFormat;
use PHPUnit\Framework\TestCase;

final class NumberFormatFactoryTest extends TestCase
{
    public function testCanMimicIntlExtensionBehavior()
    {
        $helper = new NumberFormat();
        $actual = $helper->__invoke(12, null, null, 'en_US', 4);
        $this->assertEquals('12.0000', $actual);
    }
}