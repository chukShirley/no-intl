<?php

declare(strict_types=1);

namespace NoI18N;

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
        $translator->setLocale('en_US_POSIX');
        return $translator;
    }
}