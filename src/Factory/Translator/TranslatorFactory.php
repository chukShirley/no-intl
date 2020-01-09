<?php

declare(strict_types=1);

namespace NoIntl\Factory\Translator;

use Interop\Container\ContainerInterface;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\I18n\Translator\TranslatorServiceFactory;
use Zend\ServiceManager\Factory\FactoryInterface;

final class TranslatorFactory implements FactoryInterface
{
    const DEFAULT_LOCALE = 'en_US_POSIX';

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|TranslatorInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new TranslatorServiceFactory();
        $translator = $factory($container, $requestedName, $options);
        $locale = $this->getLocale($container);
        $translator->setLocale($locale);
        return $translator;
    }

    /**
     * @param ContainerInterface $container
     * @return string
     */
    private function getLocale(ContainerInterface $container): string
    {
        $config = $container->get('config');
        if (!isset($config['no_intl']['default_locale'])) {
            return self::DEFAULT_LOCALE;
        }
        return $config['no_intl']['default_locale'];
    }
}