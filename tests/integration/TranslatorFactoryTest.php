<?php

declare(strict_types=1);

namespace NoIntlIntegrationTest;

use NoIntl\TranslatorFactory;
use PHPUnit\Framework\TestCase;
use Zend\I18n\Translator\Translator;
use Zend\ServiceManager\ServiceManager;

final class TranslatorFactoryTest extends TestCase
{
    public function testCanCreateTranslatorWithManuallyOverriddenLocale()
    {
        $factory = new TranslatorFactory();
        $defaultLocale = 'en_US_POSIX';
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
}