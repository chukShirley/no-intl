<?php

declare(strict_types=1);

namespace NoIntl;

use Interop\Container\ContainerInterface;
use Zend\I18n\Translator\Translator;
use Zend\I18n\Translator\TranslatorServiceFactory;
use Zend\ServiceManager\Factory\FactoryInterface;

final class TranslatorFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|Translator
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new TranslatorServiceFactory();
        $translator = $factory($container, $requestedName, $options);
        $locale = $container->get('config')['no_intl']['default_locale'];
        $translator->setLocale($locale);
        return $translator;
    }
}