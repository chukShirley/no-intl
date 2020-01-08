<?php

declare(strict_types=1);

namespace NoIntlIntegrationTest;

use Interop\Container\ContainerInterface;
use NoIntl\CurrencyFormatFactory;
use PHPUnit\Framework\TestCase;
use Zend\I18n\View\Helper\CurrencyFormat;

final class CurrencyFormatFactoryTest extends TestCase
{
    const DEFAULT_LOCALE = 'en_US_POSIX';

    public function testCanOverrideCurrencyFormatIntlExtensionRequirement()
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->once())->method('get')->with('config')->willReturn([
            'no_intl' => [
                'default_locale' => self::DEFAULT_LOCALE,
            ],
        ]);

        $factory = new CurrencyFormatFactory();
        $viewHelper = $factory->__invoke($container, CurrencyFormatFactory::class);
        $this->assertInstanceOf(CurrencyFormat::class, $viewHelper);
    }
}