<?php

declare(strict_types=1);

namespace NoIntl\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use NoIntl\View\Helper\CurrencyFormat;
use Zend\ServiceManager\Factory\FactoryInterface;

final class CurrencyFormatFactory implements FactoryInterface
{
    const DEFAULT_LOCALE = 'en_US_POSIX';

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CurrencyFormat|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $currency = new CurrencyFormat();
        $locale = $this->getLocale($container);
        $currency->setLocale($locale);

        return $currency;
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