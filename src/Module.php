<?php

declare(strict_types=1);

namespace NoIntl;

use NoIntl\Factory\Translator\TranslatorFactory;
use NoIntl\Factory\View\Helper\CurrencyFormatFactory;
use NoIntl\Factory\View\Helper\NumberFormatFactory;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\I18n\View\Helper\CurrencyFormat;
use Zend\I18n\View\Helper\NumberFormat;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

final class Module implements ConfigProviderInterface
{
    /**
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'service_manager' => [
                'factories' => [
                    TranslatorInterface::class => TranslatorFactory::class,
                ],
            ],
            'view_helpers' => [
                'factories' => [
                    CurrencyFormat::class => CurrencyFormatFactory::class,
                    NumberFormat::class => NumberFormatFactory::class,
                ],
            ],
        ];
    }
}