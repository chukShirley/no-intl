<?php

declare(strict_types=1);

namespace NoIntlIntegrationTest\Factory\Translator;

use NoIntl\Factory\Translator\TranslatorFactory;
use PHPUnit\Framework\TestCase;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\ServiceManager;

final class TranslatorFactoryTest extends TestCase
{
    const DEFAULT_LOCALE = 'en_US_POSIX';

    public function testCanCreateTranslatorWithManuallyOverriddenLocale()
    {
        $factory = new TranslatorFactory();
        $defaultLocale = self::DEFAULT_LOCALE;
        $serviceManagerConfig = [
            'factories' => [
                'config' => function () use ($defaultLocale) {
                    return [
                        'no_intl' => [
                            'default_locale' => $defaultLocale,
                        ],
                    ];
                }
            ]
        ];
        $translator = $factory->__invoke(new ServiceManager($serviceManagerConfig), '');
        $this->assertInstanceOf(Translator::class, $translator);
        $this->assertEquals($translator->getLocale(), $defaultLocale);

        $defaultLocale = 'en-US';
        $serviceManagerConfig = [
            'factories' => [
                'config' => function () use ($defaultLocale) {
                    return [
                        'no_intl' => [
                            'default_locale' => $defaultLocale,
                        ],
                    ];
                }
            ]
        ];
        $translator = $factory->__invoke(new ServiceManager($serviceManagerConfig), '');
        $this->assertInstanceOf(Translator::class, $translator);
        $this->assertEquals($translator->getLocale(), $defaultLocale);
    }

    public function testCanCreateTranslatorWithDefaultLocale()
    {
        $factory = new TranslatorFactory();
        $defaultLocale = self::DEFAULT_LOCALE;
        $serviceManagerConfig = [
            'factories' => [
                'config' => function () use ($defaultLocale) {
                    return [];
                }
            ]
        ];
        $translator = $factory->__invoke(new ServiceManager($serviceManagerConfig), '');
        $this->assertInstanceOf(Translator::class, $translator);
        $this->assertEquals($translator->getLocale(), $defaultLocale);
    }
}