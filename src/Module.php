<?php

declare(strict_types=1);

namespace NoIntl;

use Zend\I18n\Translator\TranslatorInterface;
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
        ];
    }
}